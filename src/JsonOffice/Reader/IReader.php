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
     * 
     */
    public function process(): void;

    /**
     * 
     */
    public function result();
}
