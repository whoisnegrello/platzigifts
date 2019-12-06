import { registerBlockType } from '@wordpress/blocks';
import { TextControl } from '@wordpress/components';

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
		return <TextControl
					label="Complete el campo"
					value={ content }
					onChange={ handlerOnChangeTextControl }
				/>
	},
	save: () => null
});