<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters for use
// ’ » “ ” …

$lang = array_merge($lang, array(
	'ACP_VIDEO_EXPLAIN'								=> 'Extensión de la galería de videos',
	'ACP_VIDEO_GENERAL_SETTINGS'					=> 'Configuración general',
	'ACP_VIDEO_ENABLE'								=> 'Habilitar página de videos',
	'ACP_VERSION_CURRENT'							=> 'Versión',
	'ACP_GOOGLE_KEY'								=> 'Clave de API pública de Google',
	'ACP_GOOGLE_KEY_EXPLAIN'						=> 'Para usar la Galería de videos, debe crear una clave <strong> de la API pública de Google</ strong>. Por favor visita<strong><a href="https://console.developers.google.com/">Consola de desarrolladores de Google</a></strong> Para generar la clave. Si tiene problemas para generar su clave, lea la guía <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">Ayuda de Google Developers Console: Claves de la API</a></strong>. Hasta que no configure su clave, la galería no estará disponible.',
	'ACP_VIDEOS_PER_PAGE'							=> 'Videos por página',
	'ACP_COMMENTS_PER_PAGE'							=> 'Comentarios por página',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'					=> 'Establecer valor para comentarios en la página de vídeo.<br /><em>El valor predeterminado es 10</em>.',
	'ACP_ENABLE_COMMENTS'							=> 'Habilitar comentarios en videos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'					=> 'Esta opción mostrará el comentario en la página de vídeo.',
	'ACP_ENABLE_VIDEO_GLOBAL'						=> 'Habilitar galería de videos',
	'ACP_ENABLE_VIDEO_GLOBAL_EXPLAIN'				=> 'Habilitar la extensión de la galería de vídeos global.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'				=> 'Activar estadísticas de vídeo en el índice',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'		=> 'Esta opción mostrará las estadísticas de vídeo en la página de índice.',
	'ACP_ENABLE_VIDEO_ON_INDEX'						=> 'Habilitar los últimos videos en el índice.',
	'ACP_ENABLE_VIDEO_ON_INDEX_EXPLAIN'				=> 'Esta opción mostrará los videos en la página de índice.',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION'			=> 'Mostrar los últimos videos en la parte superior del índice',
	'ACP_ENABLE_VIDEO_ON_INDEX_LOCATION_EXPLAIN'	=> 'Por encima o por debajo del foro.',
	'ACP_VIDEO_ON_INDEX_VALUE'						=> 'Mostrar últimos videos',
	'ACP_VIDEO_ON_INDEX_VALUE_EXPLAIN'				=> 'Valor fijo de los últimos videos en el índice.<br /><em>El valor predeterminado es 6</em>.',
	'ACP_VIDEO_SETTINGS_SAVED'						=> 'Configuraciones de la galería de videos guardadas',
	'ACP_VIDEO_TOP'									=> 'Parte superior',
	'ACP_VIDEO_BOTTOM'								=> 'Parte inferior',

	// ACP Categories
	'ACP_CATEGORY_CREATED'			=> 'Esta categoría ha sido añadida con éxito.',
	'ACP_CATEGORY_DELETE'			=> '¿Seguro que desea eliminar esta categoría?',
	'ACP_CATEGORY_DELETED'			=> 'Esta categoría ha sido eliminada correctamente.',
	'ACP_CATEGORY_EDIT'				=> 'Editar categoria',
	'ACP_CATEGORY_UPDATED'			=> '¡Esta categoría ha sido actualizada con éxito!',
	'ACP_VIDEO_CAT_ADD'				=> 'Añadir nueva categoria',
	'ACP_VIDEO_CAT_TITLE'			=> 'Título de la categoría',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Introduzca el título de la categoría.',
	'ACP_VIDEO_CAT_TITLE_TITLE'		=> 'Debe introducir un <strong>título</ strong> para esta categoría.',
	'ACP_VIDEO_OVERVIEW'			=> 'Categorías de video',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Aquí puedes administrar las categorías de video de tu directorio.',
	'ACP_VIDEO_TITLE_EXPLAIN'		=> 'Aquí puedes administrar los títulos de video de tu directorio.',
	'ACP_TITLE_DELETE'				=> '¿Estás seguro de que deseas eliminar este título?',
	'ACP_TITLE_DELETED'				=> 'Este título ha sido eliminado correctamente',
));
