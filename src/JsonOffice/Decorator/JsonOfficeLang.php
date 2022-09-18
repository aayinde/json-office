<?php
namespace Aayinde\JsonOffice\Decorator;

/**
 * Class acts as a language variable assistant.
 *
 * @author Abdulbasit Aliyu <ayindealiyu1@gmail.com>
 * @copyright 2022 (c) Abdulbasit Aliyu
 *           
 */
class JsonOfficeLang
{

    /**
     *
     * @var string
     */
    public static string $invalidJsonInput = "Input is not a valid Json String";
    
    
    /**
     *
     * @var string
     */
    public static string $invalidInput = "Input is not a valid";

    /**
     *
     * @var string
     */
    public static string $maximumNestingExceeded = "Maximum nesting, please decrease the depth value";

    /**
     *
     * @var string
     */
    public static string $invalidFile = "Sorry, this file is a valid file or is unreadble";

    /**
     *
     * @var string
     */
    public static string $invalidFileJson = "Sorry, this file content is not a valid json file";

    /**
     *
     * @var string
     */
    public static string $minimumNestingExceeded = "Minimum nesting, Depth Value must be greater than zero";

    /**
     * @var string
     */
    public static string $filenameNotValid = "Sorry, you didn't provide any name";
}
