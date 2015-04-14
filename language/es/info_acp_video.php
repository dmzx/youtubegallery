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

$lang = array_merge($lang, array(
	'VIDEO_INDEX'			=> 'Galería de Vídeo',
	'VIDEO_SELECT_CAT'		=> 'Seleccione una categoría',
	'VIDEO_SUBMIT'			=> 'Nuevo vídeo',
	'VIDEO_URL'				=> 'Introduzca la URL del vídeo',
	'VIDEO_URL_EXPLAIN'		=> '',
	'VIDEOS_TIP'			=> 'Ayuda y Sugerencias',
	'VIDEOS_TIPS'			=> '
	<ul>
		<li>Navegue hasta <a href="https://www.youtube.com/">Youtube.com</a>, y busque sus vídeos favoritos.</li>
		<li>Copie la URL del vídeo, peguelo en el campo anterior, eleja la categoría y envíe el formulario.</li>
		<li>Puede usar <strong>youtube.com</strong> y <strong>youtu.be</strong>, ambos son aceptados por la Extensión.</li>
	</ul>
	<br />
	<strong>Advertenciag: ¡Esta página no es para subir vídeos a Youtube!</strong>',
	'UNAUTHED'				=> 'No está autorizado para ver está página.',
	'VIDEO_UNAUTHED'		=> 'No esta autorizado para ver este vídeo.',
	'INVALID_VIDEO'			=> 'El vídeo seleccionado no existe.',
	'VIDEO'					=> 'Vídeos',
	'VIDEO_EXPLAIN'			=> 'Ver Galería de Vídeos de YouTube',
	'VIEW_CAT'				=> 'Ver categoría',
	'VIEW_VIDEO'			=> 'Ver vídeo',
	'VIDEO_CAT'				=> 'Categoría',
	'VIDEO_CATS'			=> 'Categorías',
	'VIDEO_CATEGORIES'		=> 'Categorías',
	'VIDEO_CREATED'			=> 'Este vídeo ha sido añadido correctamente.',
	'VIDEO_DATE'			=> 'Fecha',
	'VIDEO_DELETE'			=> 'Borrar vídeo',
	'VIDEO_DELETED'			=> 'Este vídeo ha sido borrado correctamente.',
	'PAGE_RETURN'			=>'%sVolver a la página de vídeos%s',
	'DELETE_VIDEO'			=> '¿Está seguro de querer borrar este vídeo?',
	'MY_VIDEOS'				=> 'Ver sus vídeos',
	'NEED_VIDEO_URL'		=> 'Debe introducir una <strong>URL</strong> para este vídeo.',
	'NEWEST_VIDEOS'			=> 'Nuevos vídeos',
	'NO_VIDEOS'				=> 'Esta página no tiene vídeos.',
	'NO_CATEGORIES'			=> 'Esta página no tiene categorías.',
	'RETURN_TO_VIDEO_INDEX' => 'Volver a la Galería de Vídeos',
	'SEARCH_VIDEOS'			=> 'Buscar Vídeos',
	'TOTAL_CATEGORIES_OTHER'=> 'Categorías totales <strong>%d</strong>',
	'TOTAL_CATEGORY_ZERO'	=> 'Categorías totales <strong>0</strong>',
	'TOTAL_VIDEOS'			=> 'Vídeos totales',
	'TOTAL_VIDEOS_OTHER'	=> 'Vídeos totales <strong>%d</strong>',
	'TOTAL_VIDEO_ZERO'		=> 'Vídeos totales <strong>0</strong>',
	'USER_VIDEOS'			=> 'Buscar vídeos de usuarios',

	// ACP
	'ACP_VIDEO'				=> 'Galería de Vídeos',
	'ACP_VIDEO_EXPLAIN'		=> '',
	'ACP_VIDEO_SETTINGS'	=> 'Ajustes de Vídeos',
	'ACP_VIDEO_GENERAL_SETTINGS'	=> 'Ajustes Generales',
	'ACP_VIDEO_ENABLE'		=> 'Habilitar página de Vídeos',
	'ACP_VIDEO_CATEGORY'	=> 'Categorías de Vídeos',
	'ACP_VIDEO_HEIGHT'		=> 'Altura del Vídeo',
	'ACP_VIDEO_WIDTH'		=> 'Anchura del Vídeo',
	'ACP_VERSION_CURRENT'	=> 'Versión',

	// ACP Categories
	'ACP_CATEGORY_CREATED'	=> 'Está categoría ha sido añadida correctamente.',
	'ACP_CATEGORY_DELETE'	=> '¿Está seguro de querer eliminar está categoría?',
	'ACP_CATEGORY_DELETED'	=> 'Está categoría ha sido borrada correctamente',
	'ACP_CATEGORY_EDIT'		=> 'Editar categoría',
	'ACP_CATEGORY_UPDATED'	=> '¡Está categoría ha sido actualizada correctamente!',
	'ACP_VIDEO_CAT_ADD'		=> 'Añadir nueva categoría',
	'ACP_VIDEO_CAT_TITLE'	=> 'Título de la categoría',
	'ACP_VIDEO_CAT_TITLE_EXPLAIN'	=> 'Introduzca el título de la categoría.',
	'ACP_VIDEO_CAT_TITLE_TITLE'	=> 'Debe introducir un <strong>título</strong> para está categoría.',
	'ACP_VIDEO_OVERVIEW'	=> 'Categorías de Vídeos',
	'ACP_VIDEO_OVERVIEW_EXPLAIN'	=> 'Aquí puede gestionar las categorías de vídeos de su foro.',

	// Install
	'INSTALL_TEST_CAT'		=> 'Uncategorized',

	// Permissions
	'ACL_U_VIDEO_VIEW_FULL'	=> 'Puede ver la Galería de Vídeos',
	'ACL_U_VIDEO_VIEW'		=> 'Puede ver vídeos',
	'ACL_U_VIDEO_DELETE'	=> 'Puede borrar sus propios vídeos',
	'ACL_U_VIDEO_POST'		=> 'Puede publicar vídeos',

	// View Video
	'FLASH_IS_OFF'			=> '[flash] está <em>OFF</em>',
	'FLASH_IS_ON'			=> '[flash] está <em>ON</em>',
	'VIDEO_ADD_BY'			=> 'Añadido por',
	'VIDEO_BBCODE'			=> 'BBCode',
	'VIDEO_EMBED'			=> 'Incrustar (Embed) Vídeo',
	'VIDEO_LINK'			=> 'Enlace del Vídeo',
	'VIDEO_LINKS'			=> 'Enlaces',
	'VIDEO_LINK_YOUTUBE'	=> 'Youtube Video Link',
	'VIDEO_VIEWS'			=> 'Views',

	// Youtube video text
	'VIDEO_AUTHOR'			=> 'Autor',
	'VIDEO_WATCH'			=> 'Ver en YouTube',

	//Pagination
	'LIST_VIDEO'			=> '1 Vídeo',
	'LIST_VIDEOS'			=> '%1$s Vídeos',
));
