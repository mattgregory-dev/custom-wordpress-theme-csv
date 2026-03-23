// WordPress globals (no npm imports in this theme).
const { registerBlockType } = wp.blocks;
const { createElement, Fragment } = wp.element;
const { InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps } = wp.blockEditor;
const { Button, PanelBody, TextControl } = wp.components;
const { useSelect } = wp.data;

const getMediaPreviewUrl = (media) => {
  if (!media) {
    return '';
  }

  if (media.source_url) {
    return media.source_url;
  }

  const sizes = media.media_details?.sizes;
  if (sizes?.full?.source_url) {
    return sizes.full.source_url;
  }

  return '';
};

const renderEditorPreview = ({
  eyebrow,
  title,
  description,
  buttonText,
  buttonUrl,
}, previewImageUrl, blockProps) => (
  createElement(
    'section',
    blockProps,
    createElement(
      'div',
      { className: 'csv-next-step-editor__container' },
      createElement(
        'div',
        { className: 'csv-next-step-editor__grid' },
        createElement(
          'div',
          { className: 'csv-next-step-editor__media' },
          createElement(
            'div',
            { className: 'csv-next-step-editor__media-frame' },
            previewImageUrl
              ? createElement('img', {
                  src: previewImageUrl,
                  alt: '',
                  className: 'csv-next-step-editor__media-image',
                })
              : createElement('span', { className: 'csv-next-step-editor__media-placeholder' }, '[ IMAGE ]')
          )
        ),
        createElement(
          'div',
          { className: 'csv-next-step-editor__content' },
          createElement(
            'div',
            { className: 'csv-next-step-editor__eyebrow' },
            eyebrow || 'eyebrow'
          ),
          createElement(
            'h2',
            { className: 'csv-next-step-editor__title' },
            title || 'title'
          ),
          createElement(
            'p',
            { className: 'csv-next-step-editor__description' },
            description || 'description'
          ),
          createElement(
            'a',
            {
              className: 'csv-next-step-editor__button',
              href: buttonUrl || '#',
            },
            `${buttonText || 'button text'} \u2192`
          )
        )
      )
    )
  )
);

registerBlockType('csv/next-step', {
  edit: ({ attributes, setAttributes }) => {
    const media = useSelect(
      (select) => (
        attributes.imageId
          ? select('core').getMedia(attributes.imageId)
          : null
      ),
      [attributes.imageId]
    );
    const previewImageUrl = getMediaPreviewUrl(media);
    const editorProps = useBlockProps({
      className: 'csv-next-step-editor',
    });

    return createElement(
      Fragment,
      null,
      createElement(
        InspectorControls,
        null,
        createElement(
          PanelBody,
          { title: 'Next Step Content', initialOpen: true },
          createElement(TextControl, {
            label: 'Eyebrow',
            value: attributes.eyebrow,
            onChange: (value) => setAttributes({ eyebrow: value }),
          }),
          createElement(TextControl, {
            label: 'Title',
            value: attributes.title,
            onChange: (value) => setAttributes({ title: value }),
          }),
          createElement(TextControl, {
            label: 'Description',
            value: attributes.description,
            onChange: (value) => setAttributes({ description: value }),
          }),
          createElement(TextControl, {
            label: 'Button Text',
            value: attributes.buttonText,
            onChange: (value) => setAttributes({ buttonText: value }),
          }),
          createElement(TextControl, {
            label: 'Button URL',
            value: attributes.buttonUrl,
            onChange: (value) => setAttributes({ buttonUrl: value }),
          })
        ),
        createElement(
          PanelBody,
          { title: 'Next Step Image', initialOpen: false },
          // Media picker saves ID only; preview resolves via wp.data.
          createElement(
            MediaUploadCheck,
            null,
            createElement(MediaUpload, {
              onSelect: (media) => setAttributes({
                imageId: media?.id || null,
              }),
              allowedTypes: ['image'],
              value: attributes.imageId,
              render: ({ open }) => (
                createElement(
                  Button,
                  { variant: 'secondary', onClick: open },
                  attributes.imageId ? 'Replace Image' : 'Select Image'
                )
              ),
            })
          ),
          attributes.imageId
            ? createElement(
                Button,
                {
                  variant: 'tertiary',
                  isDestructive: true,
                  onClick: () => setAttributes({ imageId: null }),
                },
                'Remove Image'
              )
            : null
        )
      ),
      renderEditorPreview(attributes, previewImageUrl, editorProps)
    );
  },
  save: () => null,
});
