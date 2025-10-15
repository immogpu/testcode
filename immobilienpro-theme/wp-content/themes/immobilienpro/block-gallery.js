(function (blocks, element, components, blockEditor, data, coreData, i18n) {
    const { registerBlockType } = blocks;
    const { Fragment, useMemo } = element;
    const { MediaUpload, InspectorControls } = blockEditor;
    const { PanelBody, Button, Spinner, Notice } = components;
    const { useSelect } = data;
    const { useEntityProp } = coreData;
    const { __ } = i18n;

    registerBlockType('immobilienpro/property-gallery', {
        title: __('Property Gallery', 'immobilienpro'),
        icon: 'format-gallery',
        category: 'widgets',
        supports: {
            html: false,
        },
        edit: function Edit() {
            const entity = useEntityProp('postType', 'property', 'meta');
            const meta = entity[0] || {};
            const setMeta = entity[1];
            const galleryValue = meta.image_gallery || '';
            const ids = useMemo(function () {
                return galleryValue
                    .split(',')
                    .map(function (id) {
                        return parseInt(id, 10);
                    })
                    .filter(function (id) {
                        return !isNaN(id);
                    });
            }, [galleryValue]);

            const images = useSelect(
                function (select) {
                    if (!ids.length) {
                        return [];
                    }
                    return select('core').getEntityRecords('root', 'media', {
                        include: ids,
                        per_page: ids.length,
                    });
                },
                [ids.join(',')]
            );

            const isRequesting = useSelect(function (select) {
                return ids.length && select('core/data').isResolving('core', 'getEntityRecords', ['root', 'media', { include: ids, per_page: ids.length }]);
            }, [ids.join(',')]);

            function updateGallery(newImages) {
                const newIds = newImages.map(function (item) {
                    return item.id;
                });
                setMeta(Object.assign({}, meta, { image_gallery: newIds.join(',') }));
            }

            return element.createElement(
                Fragment,
                null,
                element.createElement(
                    InspectorControls,
                    null,
                    element.createElement(
                        PanelBody,
                        { title: __('Gallery Settings', 'immobilienpro'), initialOpen: true },
                        element.createElement(MediaUpload, {
                            onSelect: updateGallery,
                            allowedTypes: ['image'],
                            multiple: true,
                            gallery: true,
                            value: ids,
                            render: function (openProps) {
                                return element.createElement(
                                    Button,
                                    Object.assign({ variant: 'primary' }, openProps),
                                    __('Bilder auswählen', 'immobilienpro')
                                );
                            },
                        }),
                        ids.length
                            ? element.createElement(Button, {
                                  variant: 'link',
                                  onClick: function () {
                                      setMeta(Object.assign({}, meta, { image_gallery: '' }));
                                  },
                              }, __('Galerie zurücksetzen', 'immobilienpro'))
                            : null
                    )
                ),
                ids.length === 0 &&
                    element.createElement(
                        Notice,
                        { status: 'info', isDismissible: false },
                        __('Keine Bilder ausgewählt. Bitte fügen Sie Bilder hinzu.', 'immobilienpro')
                    ),
                element.createElement(
                    'div',
                    { className: 'property-gallery-editor' },
                    isRequesting && element.createElement(Spinner, null),
                    !isRequesting && images && images.length
                        ? images.map(function (image) {
                              return element.createElement('figure', { key: image.id }, element.createElement('img', { src: image.source_url, alt: image.alt_text || image.title.rendered }));
                          })
                        : null
                )
            );
        },
        save: function Save() {
            return null;
        },
    });
})(window.wp.blocks, window.wp.element, window.wp.components, window.wp.blockEditor || window.wp.editor, window.wp.data, window.wp.coreData, window.wp.i18n);
