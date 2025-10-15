import { promises as fs } from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const projectRoot = path.resolve(__dirname, '..');

const srcDir = path.join(projectRoot, 'src');
const stylesDir = path.join(projectRoot, 'styles');
const distDir = path.join(projectRoot, 'dist');

async function ensureDir(dir) {
  await fs.mkdir(dir, { recursive: true });
}

async function build() {
  const pkgRaw = await fs.readFile(path.join(projectRoot, 'package.json'), 'utf8');
  const pkg = JSON.parse(pkgRaw);
  await ensureDir(distDir);

  const jsSource = await fs.readFile(path.join(srcDir, 'mp4player.js'), 'utf8');
  const banner = `/**\n * ${pkg.name} v${pkg.version}\n * ${pkg.description}\n * (c) ${new Date().getFullYear()} ${pkg.author || 'Universal MP4 Player contributors'}\n * Released under the ${pkg.license} License.\n */\n\n`;
  await fs.writeFile(path.join(distDir, 'mp4player.js'), banner + jsSource, 'utf8');

  const cssSource = await fs.readFile(path.join(stylesDir, 'mp4player.css'), 'utf8');
  await fs.writeFile(path.join(distDir, 'mp4player.css'), cssSource, 'utf8');
}

build().catch((error) => {
  console.error(error);
  process.exitCode = 1;
});
