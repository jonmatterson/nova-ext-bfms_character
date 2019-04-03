# Nova Extension: BFMS Characters

This extension provides the ability to link a Nova character profile to a profile managed by the Bravo Fleet Management System. Once linked, this extension will pull the biographical information and service record from the Bravo Fleet Management System.

## Requirements

This extension requires:

- PHP cURL Enabled
- Nova 2.6+
- Nova Extension [`jquery`](https://github.com/jonmatterson/nova-ext-jquery)

## Installation

Copy the entire directory into `applications/extensions/bfms_character`.

Run the following command in your MySQL database:

```
ALTER TABLE nova_characters ADD COLUMN bfms_character_url TEXT;
```

Add the following to `application/config/extensions.php`:

```
$config['extensions']['enabled'][] = 'jquery';
$config['extensions']['enabled'][] = 'bfms_character';
```

If you are already including `jquery` in your extension config, you do not need to include it twice. Instead, simply ensure it is loaded before the `bfms_character` extension.

## Usage

This extension adds a new field `Bravo Fleet Management System Character URL` to the member application and character create/edit pages. If a BFMS character URL is specified, this extension will hide the default field for History in both these create/edit pages, as well as the tab `History` on the character show page. Additionally, in place of the `History` tab on the character show page, it will add two of its own tabs sourced from BFMS data (namely its own `History` tab and a new `Service Record` tab).

## Issues

If you encounter a bug or have a feature request, please report it on GitHub in the issue tracker here: https://github.com/jonmatterson/nova-ext-bfms_character/issues

## License

Copyright (c) 2018-2019 Jon Matterson.

This module is open-source software licensed under the **MIT License**. The full text of the license may be found in the `LICENSE` file.
