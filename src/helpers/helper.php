<?php

/*
 * dd() function is used for debugging by printing the provided data in a readable format.
 * It wraps print_r() within <pre> tags for better readability and halts execution with exit(1).
 * This function helps quickly inspect variables or data structures during development.
 */
if (! function_exists('dd')) {
    function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit(1);
    }
}
