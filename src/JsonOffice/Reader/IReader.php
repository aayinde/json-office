<?php
namespace Aayinde\JsonOffice\Reader;

/**
 *
 * @author aaliyu
 *        
 */
interface IReader
{

    /**
     */
    public function process(): void;

    /**
     */
    // @phpstan-ignore-next-line
    public function result();
}
