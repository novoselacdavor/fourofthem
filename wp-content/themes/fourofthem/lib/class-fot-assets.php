<?php
/**
 * FOT_Assets helper class.
 */
final class FOT_Assets {
	/**
	 * Theme template directory absolute server path.
	 *
	 * @var string
	 */
	private static $assets_directory;

	/**
	 * Theme template directory URI.
	 *
	 * @var string
	 */
	private static $assets_directory_uri;

	/**
	 * Path of the dist directory relative to theme root directory.
	 *
	 * @var string
	 */
	private static $assets_dist_dir_path = 'assets/dist';

	/**
	 * Init the class.
	 *
	 * @return void
	 */
	public static function init() : void {
		self::set_assets_paths();
	}

	/**
	 * Set assets paths.
	 *
	 * @return void
	 */
	private static function set_assets_paths() : void {
		self::$assets_directory     = trailingslashit( get_template_directory() ) . trailingslashit( self::$assets_dist_dir_path );
		self::$assets_directory_uri = trailingslashit( get_template_directory_uri() ) . trailingslashit( self::$assets_dist_dir_path );
	}

	/**
	 * Get asset URI.
	 *
	 * @param string $asset_path Path relative to self::$assets_directory_uri.
	 * @return string
	 */
	public static function get_asset_uri( string $asset_path ) : string {
		return self::$assets_directory_uri . $asset_path;
	}

	/**
	 * Get asset server path.
	 *
	 * @param string $asset_path Path relative to self::$assets_directory.
	 * @return string
	 */
	public static function get_asset_path( string $asset_path ) : string {
		return trailingslashit( self::$assets_directory ) . $asset_path;
	}

	/**
	 * Check if asset exists.
	 *
	 * @param string $asset_path Asset path relative to self::$assets_directory.
	 * @return bool
	 */
	public static function asset_exists( string $asset_path ) : bool {
		return file_exists( self::get_asset_path( $asset_path ) );
	}
}

/**
 * Init FOT_Assets helper class.
 */
FOT_Assets::init();
