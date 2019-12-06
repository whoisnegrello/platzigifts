import { registerBlockType } from '@wordpress/blocks';
import { InspectorControls } from '@wordpress/editor';
import { TextControl, PanelBody, PanelRow } from '@wordpress/components';

registerBlockType('pgb/basic-block', {
	title: 'Basic Block',
	description: 'Este bloque no tiene ninguna funcionalidad, simplemente es un Hello World.',
	icon: 'smiley',
	category: 'layout',
    keywords: [ 'wordpress', 'gutenberg', 'platzigift'],
    attributes: {
		content: {
			type: 'string',
			default: 'Hello world'
		}
	},
	edit: (props) => {
		const { attributes: { content }, setAttributes, className } = props;
		const handlerOnChangeTextControl = (newContent) => {
			setAttributes( { content: newContent } )
		}
		return <>
            <InspectorControls>
                <PanelBody
                    title="Modificar texto del Bloque Básico"
                    initialOpen={ false }
                >
                    <PanelRow>
                        <TextControl
                            label="Complete el campo"
                            value={ content }
                            onChange={ handlerOnChangeTextControl }
                        />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <h2>{content}</h2>
        </>
	},
	save: () => null
});