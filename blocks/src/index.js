import { registerBlockType } from '@wordpress/blocks';

registerBlockType('pgb/basic-block', {
	title: 'Basic Block',
	description: 'Este bloque no tiene ninguna funcionalidad, simplemente es un Hello World.',
	icon: 'smiley',
	category: 'layout',
	keywords: [ 'wordpress', 'gutenberg', 'platzigift'],
	edit: () => <div>Hola, mundo!!!</div>,
	save: () => <div>Hola, mundo!!!</div>,
});