<?php

/**
 * @file
 * Customize the display of a webform submission.
 *
 * Available variables:
 * - $node: The node object for this webform.
 * - $submission: The Webform submission array.
 * - $email: If sending this submission in an e-mail, the e-mail configuration
 *   options.
 * - $format: The format of the submission being printed, either "html" or
 *   "text".
 * - $renderable: The renderable submission array, used to print out individual
 *   parts of the submission, just like a $form array.
 */
?>
<?php print t("<H1>Plan of Study</h1>") ?>
<?php print t("<style> .webform-component-display{float:left;margin:0px;width:16%;padding:0;min-height:60px;}") ?>
<?php print t(".webform-submission-navigation{float:left;width:100%}") ?>
<?php print t("#webform-component-goals,#webform-component-interests,#webform-component-changes,#webform-component-class-adviser,#webform-component-fyis-1,#webform-component-fyis-2,#webform-component-fyis-3,#webform-component-fyis-4,#webform-component-fyis-5,#webform-component-fyws-1,#webform-component-fyws-2,#webform-component-fyws-3,#webform-component-fyws-4,#webform-component-fyws-5{float:left;width:100%;margin:10px 10px 10px 0px;background-color:#ffc;padding: 5px;}</style>") ?>
<?php print drupal_render_children($renderable); ?>
