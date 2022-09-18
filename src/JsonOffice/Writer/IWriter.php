<?php
namespace Aayinde\JsonOffice\Writer;

/**
 * This class serve as the contract for Class that wwant to extend the base Class
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *           
 */
interface IWriter
{

    /**
     * Method that get run in order to process the response
     */
    public function process(): void;

    /**
     * Methos that returns the final output after response has the process
     */
    // @phpstan-ignore-next-line
    public function result();
}
