"""Simple Chromium process monitor.

This script periodically checks whether a Chromium binary is running on the
system. If no matching process is found, it executes a configurable restart
command. Adjust the ``RESTART_COMMAND`` constant below to fit the deployment
scenario (for example, a ``systemctl`` call or a shell script).
"""

from __future__ import annotations

import subprocess
import sys
import time
from typing import Sequence


#: Command executed when Chromium is not detected. Change this to whatever is
#: needed in your environment (e.g. a systemd service restart or a custom
#: script).
RESTART_COMMAND: Sequence[str] = ("/usr/bin/chromium",)

#: The process name or unique part of the Chromium command line to look for.
PROCESS_NAME = "chromium"

#: Wait time between checks in seconds.
CHECK_INTERVAL_SECONDS = 10


def is_process_running(process_name: str) -> bool:
    """Return ``True`` if *process_name* is present in the process list.

    The function uses ``pgrep`` (with ``-f`` so command lines are matched as
    well) to keep the implementation simple and dependency-free.
    """

    try:
        result = subprocess.run(
            ["pgrep", "-f", process_name],
            check=False,
            stdout=subprocess.DEVNULL,
            stderr=subprocess.DEVNULL,
        )
    except FileNotFoundError:
        print("Error: pgrep not found on this system.", file=sys.stderr)
        sys.exit(1)

    return result.returncode == 0


def restart_chromium(command: Sequence[str]) -> None:
    """Execute *command* to restart Chromium and log the outcome."""

    command_display = " ".join(command)
    print(f"Attempting to restart Chromium using command: {command_display}")

    try:
        subprocess.run(command, check=True)
        print("Restart command executed successfully.")
    except subprocess.CalledProcessError as exc:
        print(f"Restart command failed with exit code {exc.returncode}.", file=sys.stderr)
    except FileNotFoundError:
        print(
            "Restart command failed: executable not found. "
            "Please adjust RESTART_COMMAND.",
            file=sys.stderr,
        )


def monitor_loop() -> None:
    """Continuously check for the Chromium process and restart if absent."""

    print(
        "Starting Chromium monitor. Press Ctrl+C to stop.\n"
        f"Monitoring process name: {PROCESS_NAME}\n"
        f"Check interval: {CHECK_INTERVAL_SECONDS} seconds\n"
        f"Restart command: {' '.join(RESTART_COMMAND)}"
    )

    try:
        while True:
            if is_process_running(PROCESS_NAME):
                print("Chromium is running.")
            else:
                print("Chromium is not running. Triggering restart...")
                restart_chromium(RESTART_COMMAND)

            time.sleep(CHECK_INTERVAL_SECONDS)
    except KeyboardInterrupt:
        print("\nChromium monitor stopped by user.")


if __name__ == "__main__":
    monitor_loop()
