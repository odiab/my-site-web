<?php
namespace OmarDiab\PHPFramework\Helpers;

class StringTools {
  /**
   * Standardizes form of extension to have a leading '.'. Returns NULL on
   * failure.
   * @param $ext string Extension to standardize
   * @return string|NULL Standardized extension, or NULL on failure.
   */
  public static function standardizeExtension($ext) {
    if (!is_string($ext)) {
      throw new InvalidArgumentException('Extension must be a string');
    }

    $extLen = strlen($ext);
    if ($extLen == 0 || ($extLen == 1 && $ext[0] == '.')) {
      return NULL;
    }

    if ($ext[0] != '.') {
      $ext = '.' . $ext;
    }

    return $ext;
  }

  /**
   * Removes specified extension from file if one exists.
   * @param $path string Path to manipulate
   * @param $ext string Extension to remove
   * @return string Modified path
   */
  public static function removeExtension($path, $ext)
  {
    // validate
    if (!is_string($path)) {
      throw new InvalidArgumentException('Path must be a string');
    }

    if (!is_string($ext)) {
      throw new InvalidArgumentException('Extension must be a string');
    }

    $ext = self::standardizeExtension($ext);
    if ($ext === NULL) {
      throw new InvalidArgumentException('Extension to remove was empty.');
    }

    $extLen = strlen($ext);
    $len = strlen($path);
    if ($len - $extLen < 0) {
      return $path;
    }

    // only remove if in string
    if (substr($path, -$extLen) == $ext) {
      $path = substr($path, 0, $len - $extLen);
    }
    return $path;
  }

  /**
   * Adds extension to file, so long as it is not an empty string and doesn't
   * already have that extension.
   * @param $path string Path to manipulate
   * @return string Modified path
   */
  public static function addExtension($path, $ext)
  {
    // validation
    if (!is_string($path)) {
      throw new InvalidArgumentException('Path must be a string');
    }

    if (!is_string($ext)) {
      throw new InvalidArgumentException('Extension must be a string');
    }

    $ext = self::standardizeExtension($ext);
    if ($ext === NULL) {
      throw new InvalidArgumentException('Extension to remove was empty.');
      return NULL;
    }

    $len = strlen($path);
    $extLen = strlen($ext);
    if ($len == 0) {
      return $path;
    }

    // only add if not already in string
    if ($len < $extLen || substr($path, -$extLen) != $ext) {
      $path .= $ext;
    }
    return $path;
  }

  /**
   * Removes trailing slashes and leading slashes for paths
   * @param $path string Path to manipulate
   * @return string Modified path
   */
  public static function standardizeSlashes($path)
  {
    // if path is empty, already standardized
    if (!is_string($path)) {
      throw new InvalidArgumentException('Path must be a string');
    }

    $len = strlen($path);
    if ($len == 0) {
      return $path;
    }

    // Remove trailing slash, if it is there.
    if ($path[$len - 1] == '/') {
      $path = substr($path, 0, $len - 1);
    }

    // remove leading slash, if it is there. Edge case: root directiory ('/')
    $len = strlen($path);
    if ($len > 0 && $path[0] == '/') {
      $path = substr($path, 1, $len - 1);
    }

    return $path;
  }

  /**
   * Removes query string from URL, if it is there.
   * @param string $path URL to strip
   * @return string Stripped path
   */
  public static function removeQueryString($path)
  {
    if (!is_string($path)) {
      throw new InvalidArgumentException('Path must be a string');
    }

    $parts = explode('?', $path, 2);
    if ($parts != FALSE && count($parts) > 0) {
      $path = $parts[0];
    }
    return $path;
  }
}
