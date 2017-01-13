<?php
/**
*
* @package phpBB Extension - Youtube Videos Gallery
* @copyright (c) 2015 dmzx - http://www.dmzx-web.net
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @Author _Vinny_ - http://www.suportephpbb.com.br
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
	'VIDEO_INDEX'				=> 'Galeria de VIDEOS',
	'VIDEO_SELECT_CAT'			=> 'Seleccione una categoría',
	'VIDEO_SUBMIT'				=> 'Nuevo Video',
	'VIDEO_URL'					=> 'Introduce la URL del video',
	'VIDEOS_TIP'				=> 'Ayuda y Sugerencias',
	'VIDEOS_TIPS_PART_01'		=> 'Buscar en <a href="https://www.youtube.com/">Youtube.com</a>, busca tus videos favoritos.',
	'VIDEOS_TIPS_PART_02'		=> 'Copia la URL del video, pégala en el campo anterior, elige la categoría y envía el formulario.',
	'VIDEOS_TIPS_PART_03'		=> 'YPuedes usar <strong>youtube.com</ strong> y <strong>youtu.be</ strong>, ambos son aceptados por la Extensión.',
	'VIDEOS_TIPS_PART_04'		=> 'Advertencia',
	'VIDEOS_TIPS_PART_05'		=> '¡Esta página no es para subir videos a Youtube!',
	'VIDEO_UNAUTHED'			=> 'No estás autorizado para ver este video.',
	'INVALID_VIDEO'				=> 'El video seleccionado no existe.',
	'VIDEO'						=> 'Videos',
	'VIDEO_EXPLAIN'				=> 'Ver la galería de videos de Youtube',
	'VIEW_CAT'					=> 'Ver Categoria',
	'VIEW_VIDEO'				=> 'Ver Video',
	'VIDEO_CAT'					=> 'Categoría',
	'VIDEO_CATS'				=> 'Categorías',
	'VIDEO_CREATED'				=> 'Este video se ha agregado correctamente.',
	'VIDEO_DATE'				=> 'Fecha',
	'VIDEO_DELETE'				=> 'Borrar video',
	'VIDEO_DELETED'				=> 'Este video se ha borrado correctamente.',
	'VIDEO_LAST'				=> 'Última',
	'VIDEO_VERSION'				=> 'Versión',
	'PAGE_RETURN'				=> '%sVolver a la página de videos%s',
	'COMMENTS'					=> 'Comentarios',
	'POST_COMMENT'				=> 'Publicar un comentario',
	'COMMENT_CREATED'			=> 'Tu comentario ha sido añadido correctamente.',
	'VIDEO_CMNT_SUBMIT'			=> 'Publicar un nuevo comentario',
	'NO_VIDEOS_COMMENTS'		=> 'Este video no tiene comentarioss.',
	'VIDEO_COMMENT'				=> 'Comentario',
	'VIDEO_COMMENTS'			=> 'Comentarios',
	'COMMENT_DELETED_SUCCESS'	=> 'Este comentario se ha eliminado correctamente..',
	'DELETE_COMMENT_CONFIRM'	=> '¿Seguro que quieres eliminar este comentario?',
	'DELETE_COMMENT_NOT'		=> 'Comentario <strong>not</strong> borrado.',
	'DELETE_VIDEO'				=> '¿Seguro que quieres eliminar este video?',
	'MY_VIDEOS'					=> 'Ver tus videos',
	'NEED_VIDEO_URL'			=> 'YDebe introducir una <strong>url</strong> para este video.',
	'NEWEST_VIDEOS'				=> 'Vídeos más recientes',
	'NO_VIDEOS'					=> 'Esta página no tiene videos.',
	'NO_CAT_VIDEOS'				=> 'Esta categoría no tiene videos o no existe.',
	'NO_USER_VIDEOS'			=> 'Este usuario no tiene videos o no existe.',
	'NO_CATEGORIES'				=> 'Esta página no tiene categorías.',
	'NO_TITLE'					=> 'Esta página no tiene títulos.',
	'RETURN_TO_VIDEO_INDEX'		=> 'Volver a la Galería de videos',
	'SEARCH_VIDEOS'				=> 'Buscar Videos',
	'TOTAL_VIDEOS'				=> 'Videos totales',
	'TOTAL_CATEGORIES'	=> array(
		0 => 'No hay categorías',
		1 => 'Total <strong>%1$d</strong> categoría',
		2 => 'Total <strong>%1$d</strong> categorías',
	),
	'TOTAL_VIDEO'		=> array(
		0 => 'No hay vídeos',
		1 => 'Total <strong>%1$d</strong> video',
		2 => 'Total <strong>%1$d</strong> videos',
	),

	'TOTAL_VIEWS'		=> array(
		0 => 'No hay vistas',
		1 => 'Total <strong>%1$d</strong> visitado',
		2 => 'Total <strong>%1$d</strong> visitados',
	),

	'TOTAL_COMMENTS'	=> array(
		0 => 'Sin comentarios',
		1 => 'Total <strong>%1$d</strong> comentario',
		2 => 'Total <strong>%1$d</strong> comentarios',
	),
	'USER_VIDEOS'				=> 'Todos los videos de Usuario',
	'USER_VIDEOS_EXPLAIN'		=> 'Mostrar todo',
	'NO_KEY_ADMIN'				=> 'Estimado administrador, para usar la Galería de Video, debe configurar una <strong>clave de Google Public API</ strong>, ir al Panel de Control de Administración y seguir las instrucciones.',
	'NO_KEY_USER'				=> 'Estimado usuario, la galería no está disponible. Por favor regresa más tarde.',
	'COMMENTS_DISABLED'			=> 'Los comentarios están inhabilitados.',
	'DELETE_COMMENT'			=> 'Borrar comentario',

	// View Video
	'FLASH_IS_OFF'				=> '[flash]<em>OFF</em>',
	'FLASH_IS_ON'				=> '[flash<em>ON</em>',
	'VIDEO_ADD_BY'				=> 'Añadido por',
	'VIDEO_BBCODE'				=> 'BBcode',
	'VIDEO_EMBED'				=> 'Incrustar video',
	'VIDEO_LINK'				=> 'Enlace de video',
	'VIDEO_LINKS'				=> 'Enlaces',
	'VIDEO_LINK_YOUTUBE'		=> 'YEnlace de video de Youtube',
	'VIDEO_VIEWS'				=> 'Visto',

	// Youtube video text
	'VIDEO_AUTHOR'				=> 'Autor',
	'VIDEO_WATCH'				=> 'Ver en YouTube',

	//Pagination
	'LIST_COMMENT'		=>	array(
		1 => '%s comentário',
		2 => '%s comentários',
	),
	'LIST_VIDEO'		=>	array(
		1 => '%s video',
		2 => '%s videos',
	),
));
