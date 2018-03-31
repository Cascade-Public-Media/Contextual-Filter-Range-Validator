Contextual Filter Range Validator
---------------------------------

### About

Contextual Filter Range Validator adds a Vies contextual filter validator that 
can evaluate a numeric filter value based on user-supplied constraints.

### Use Cases

#### Hide or show a view attachment based on a `page` URL parameter.

The example steps below can be used to display a view attachment on the first
page only:

1. Create a page view with an attachment.
1. Add a contextual filter to the attachment (*Attachment* -> *Advanced* ->
*Contextual Filters* -> *Add*)
1. From the **For** select list at the top of the configuration page, select 
*This attachment (override)*.
1. Under **When the filter value is NOT available**, select *Provide a default
value* and set the following options:
    - **Type**: Query parameter
    - **Query parameter**: page
    - **Fallback value**: 0
1. Under **When the filter value IS available or a default is provided**, select
*Specify validation criteria* and set the following options:
    - **Validator**: Range
    - **Minimum value**: (blank)
    - **Maximum value**: 0
    - **Action to take if filter value does not validate**: Hide view
1. Click **Apply (this display)**.

Once this view is saved, the view page should only show the attachment on the 
first page because this module's validator is set to hide the attachment 
whenever the `page` URL parameter is not empty (or zero).

### Requirements

- Views (core)

### Installation

1. Download and uncompress the module manually or via Composer.
1. Enable the module from `/admin/modules`.

### Sponsorship

Development of Contextual Filter Range Validator is supported by 
[Cascade Public Media](https://www.drupal.org/cascade-public-media)
for [KCTS9.org](https://kcts9.org/) and [Crosscut.com](https://crosscut.com/).
