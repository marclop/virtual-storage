<?php
namespace Cmp\Storage;

/**
 * Created by PhpStorm.
 * User: jordimartin
 * Date: 08/07/16
 * Time: 10:40
 */
interface VirtualStorageInterface
{
    /**
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return bool
     */
    public function exists($path);

    /**
     * Read a file.
     *
     * @param string $path The path to the file.
     *
     * @throws \Cmp\Storage\FileNotFoundException
     *
     * @return string The file contents or false on failure.
     */
    public function get($path);

    /**
     * Retrieves a read-stream for a path.
     *
     * @param string $path The path to the file.
     *
     * @throws \Cmp\Storage\FileNotFoundException
     *
     * @return resource The path resource or false on failure.
     */
    public function getStream($path);

    /**
     * Rename a file.
     *
     * @param string $path    Path to the existing file.
     * @param string $newpath The new path of the file.
     *
     * @throws \Cmp\Storage\FileExistsException   Thrown if $newpath exists.
     * @throws \Cmp\Storage\FileNotFoundException Thrown if $path does not exist.
     *
     * @return bool True on success, false on failure.
     */
    public function rename($path, $newpath);

    /**
     * Delete a file.
     *
     * @param string $path
     *
     * @throws \Cmp\Storage\FileNotFoundException
     *
     * @return bool True on success, false on failure.
     */
    public function delete($path);

    /**
     * Create a file or update if exists. It will create the missing folders.
     *
     * @param string $path     The path to the file.
     * @param string $contents The file contents.
     *
     * @return bool True on success, false on failure.
     * @throws \Cmp\Storage\InvalidPathException
     */
    public function put($path, $contents);

    /**
     * Create a file or update if exists. It will create the missing folders.
     *
     * @param string   $path     The path to the file.
     * @param resource $resource The file handle.
     *
     * @throws \Cmp\Storage\InvalidPathException
     * @throws \Cmp\Storage\InvalidArgumentException Thrown if $resource is not a resource.
     *
     * @return bool True on success, false on failure.
     */
    public function putStream($path, $resource);
}
