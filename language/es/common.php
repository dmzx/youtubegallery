<?php
/**
*
* Youtube Videos Gallery extension for the phpBB Forum Software package.
*
* @copyright (c) 2015 dmzx <http://www.dmzx-web.net> & _Vinny_ <http://www.suportephpbb.com.br>
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
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
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'VIDEO_INDEX'			=> 'Galería de videos',
	'VIDEO_SELECT_CAT'		=> 'Seleccione una categoría',
	'VIDEO_SUBMIT'			=> 'Nuevo Video',
	'VIDEO_URL'				=> 'Introduzca URL del video',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Ayuda y Sugerencias',
	'VIDEOS_TIPS_PART_01'	=> 'Busca en <a href="https://www.youtube.com/">Youtube.com</a>, tus videos favoritos.',
	'VIDEOS_TIPS_PART_02'	=> 'Copia la URL del video, pegalo en el campo de arriba, elege la categoría y envia el formulario.',
	'VIDEOS_TIPS_PART_03'	=> 'Puedes usar <strong>youtube.com</strong> y <strong>youtube</strong>, ambos son aceptados por la Extensión.',
	'VIDEOS_TIPS_PART_04'	=> 'Advertencia',
	'VIDEOS_TIPS_PART_05'	=> 'Eesta página no es para subir vídeos a Youtube!',
	'VIDEO_UNAUTHED'		=> 'Usted no está autorizado para ver el vídeo.',
	'INVALID_VIDEO'			=> 'El vídeo que ha seleccionado no existe.',
	'VIDEO'					=> 'Videos',
	'VIDEO_EXPLAIN'			=> 'Ver galería de videos de Youtube',
	'VIEW_CAT'				=> 'Ver Categoría',
	'VIEW_VIDEO'			=> 'Ver Video',
	'VIDEO_CAT'				=> 'Categoría',
	'VIDEO_CATS'			=> 'Categorías',
	'VIDEO_CREATED'			=> 'Este video ha sido agregado con éxito.',
	'VIDEO_DATE'			=> 'Fecha',
	'VIDEO_DELETE'			=> 'Borrar video',
	'VIDEO_DELETED'			=> 'Este vídeo se ha eliminado correctamente.',
	'PAGE_RETURN'			=> '%sVolver a la página de vídeos%s',
	'COMMENTS'				=> 'Comentarios',
	'POST_COMMENT'			=> 'Publicar un comentario',
	'COMMENT_CREATED'		=> 'Su comentario ha sido agregado con éxito.',
	'VIDEO_CMNT_SUBMIT'		=> 'Publicar un nuevo comentario',
	'NO_VIDEOS_COMMENTS'	=> 'Este video no tiene comentarios.',
	'VIDEO_COMMENT'			=> 'Comentarios',
	'VIDEO_COMMENTS'		=> 'Comentarios',
	'COMMENT_DELETED_SUCCESS'	=> 'Este comentario ha sido eliminado correctamente.',
	'DELETE_COMMENT_CONFIRM'	=> '¿Seguro que quiere borrar este comentario?',
	'DELETE_VIDEO'			=> '¿Seguro que quiere borrar este vídeo?',
	'MY_VIDEOS'				=> 'Ver los vídeos',
	'NEED_VIDEO_URL'		=> 'Debe introducir una <strong>url</strong> para este vídeo.',
	'NEWEST_VIDEOS'			=> 'Nuevos Videos',
	'NO_VIDEOS'				=> 'Esta página no tiene videos.',
	'NO_CAT_VIDEOS'			=> 'Esta categoría no tiene videos o no existe.',
	'NO_USER_VIDEOS'		=> 'Este usuario no tiene videos o no existe.',
	'NO_CATEGORIES'			=> 'Esta página no tiene categorías.',
	'NO_TITLE'				=> 'Esta página no tiene títulos.',
	'RETURN_TO_VIDEO_INDEX' => 'Volver a la galería de vídeo',
	'SEARCH_VIDEOS'			=> 'Buscar Videos',
	'TOTAL_CATEGORIES_OTHER'=> 'Categorias Totales <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Categorias Totales <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Videos Totales',
	'TOTAL_VIDEOS_OTHER'	=> 'Videos Totales <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Videos Totales <strong>0</strong>',
	'TOTAL_VIEWS_OTHER'		=> 'Vistas totales <strong>%d</strong>',
	'TOTAL_VIEW_ZERO'		=> 'Vistas totales <strong>0</strong>',
	'TOTAL_COMMENTS_OTHER'	=> 'Comentarios totales <strong>%d</strong>',
	'TOTAL_COMMENT_ZERO'	=> 'Comentarios totales <strong>0</strong>',
	'USER_VIDEOS'			=> 'Buscar videos de usuario',
	'NO_KEY_ADMIN'				=> 'Estimado administrador, con el fin de utilizar galeria, se debe establecer un <strong>Google Public API key</strong>, vé al Panel de Control de Administración y siga las instrucciones.',
	'NO_KEY_USER'			=> 'Estimado usuario, la galería no está disponible. Por favor regresa más tarde.',
	'COMMENTS_DISABLED'		=> 'Los comentarios están desactivados.',
	'DELETE_COMMENT'		=> 'Borrar comentario',

	// ACP
	'ACP_VIDEO'				=> 'Galleria de Video',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Ajustes de video',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Configuración general',
	'ACP_VIDEO_ENABLE'		=> 'Habilitar los videos de la página',
	'ACP_VIDEO_CATEGORY'	=> 'Categorías cel Video',
	'ACP_VIDEO_HEIGHT'		=> 'Altura del Vídeo',
	'ACP_VIDEO_HEIGHT_EXPLAIN'		=> 'Ajuste la altura de vídeo.',
	'ACP_VIDEO_WIDTH'		=> 'Ancho del Vídeo',
	'ACP_VIDEO_WIDTH_EXPLAIN'		=> 'SEstablecer el ancho de vídeo.',
	'ACP_VERSION_CURRENT'	=> 'Version',
	'ACP_GOOGLE_KEY'		=> 'Google Public API key',
	'ACP_GOOGLE_KEY_EXPLAIN'=> 'Para utilizar galeria, debe crear un <strong>Google Public API key</strong>. Por favor, visita<strong><a href="https://console.developers.google.com/">Google Developers Console</a></strong> para generar la clave. Si tiene problemas para generar su clave, lea la guía <strong><a href="https://developers.google.com/console/help/new/#generatingdevkeys">Google Developers Console Help: API keys</a></strong>. Hasta configurar su clave, la galería no estará disponible.',
	'ACP_VIDEOS_PER_PAGE'	=> 'Videos por página',
	'ACP_COMMENTS_PER_PAGE'	=> 'Comentarios por página',
	'ACP_COMMENTS_PER_PAGE_EXPLAIN'	=> 'Valor de ajuste para los comentarios en la página de vídeo.<br /><em>El valor predeterminado es 10</em>.',
	'ACP_ENABLE_COMMENTS'	=> 'Habilitar comentarios en los vídeos',
	'ACP_ENABLE_COMMENTS_EXPLAIN'	=> 'Esta opción mostrará el comentario en la página de vídeo.',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX'	=> 'Habilitar las estadísticas sobre el índice de vídeo',
	'ACP_ENABLE_VIDEO_STATICS_ON_INDEX_EXPLAIN'	=> 'Esta opción mostrará las estadísticas de video en la página de índice.',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'Esta categoría ha sido agregada con éxito.',
	'ACP_CATEGORY_DELETE'	=> '¿Seguro que desea eliminar esta categoría?',
	'ACP_CATEGORY_DELETED'	=> 'Esta categoría se ha eliminado correctamente',
	'ACP_CATEGORY_EDIT'		=> 'Editar categoría',
	'ACP_CATEGORY_UPDATED'	=> '¡Esta categoría se ha actualizado correctamente!',
	'ACP_VIDEO_CAT_ADD'		=> 'Añadir Nueva Categoría',
	'ACP_VIDEO_CAT_TITLE'	=> 'Título de la categoría',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Introduzca el título de la categoría.',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'Debe introducir un <strong>título</strong> para esta this categoría.',
	'ACP_VIDEO_OVERVIEW'	=> 'Categorías de Video',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Aquí puede gestionar las Categorías de Video de tu tabla.',
	'ACP_VIDEO_TITLE'	=> 'Títulos para vídeo',
	'ACP_VIDEO_TITLE_EXPLAIN'	=> 'Aquí puede gestionar los títulos de vídeo de su tablero.',
	'ACP_TITLE_DELETE'	=> '¿Seguro que desea eliminar este título?',
	'ACP_TITLE_DELETED'	=> 'Este título se ha eliminado correctamente',

	// Install
	'INSTALL_TEST_CAT'		=> 'Sin categoría',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Puede ver la galeria',
	'ACL_U_VIDEO_VIEW'		=> 'Puede ver los vídeos',
	'ACL_U_VIDEO_DELETE'	=> 'Puede eliminar sus propios videos',
	'ACL_U_VIDEO_POST'		=> 'Puede publicar vídeos',
	'ACL_U_VIDEO_COMMENT'	=> 'Puede enviar comentarios en los vídeos',
	'ACL_U_VIDEO_COMMENT_DELETE'		=> 'Se puede eliminar comentarios de videos propios',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] is <em>OFF</em>',
	'FLASH_IS_ON'			=> '[flash] is <em>ON</em>',
	'VIDEO_ADD_BY'			=> 'Añadido por',
	'VIDEO_BBCODE'			=> 'BBcode',
	'VIDEO_EMBED'			=> 'Insertar Video',
	'VIDEO_LINK'			=> 'Link del Video',
	'VIDEO_LINKS'			=> 'Links',
	'VIDEO_LINK_YOUTUBE'	=> 'Link del Video en Youtube',
	'VIDEO_VIEWS'			=> 'Ver',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Autor',
	'VIDEO_WATCH'			=> 'Ver en YouTube',

	//Pagination
	'LIST_VIDEO'			=> '1 Video',
	'LIST_VIDEOS'			=> '%1$s Videos',
	'LIST_COMMENT'			=> '1 Comentario',
	'LIST_COMMENTS'			=> '%1$s Comentarios',

));

