<?php

namespace ABT\i18n;

if (!defined('ABSPATH')) {
    exit(1);
}

function generate_translations() {
    $ABT_i18n = (object)array(
        'citationTypes' => array(),
        'dialogs' => (object)array(),
        'errors' => array(),
        'fieldmaps' => (object)array(),
        'misc' => array(),
        'referenceList' => array(),
    );

    $ABT_i18n->misc = array(
        'footnotes' => __('Footnotes', 'academic-bloggers-toolkit'),
    );

    $ABT_i18n->errors = array(
        'missingPhpFeatures' => sprintf(__('Your WordPress PHP installation is incomplete. You must have the following PHP extensions enabled to use this feature: %s', 'academic-bloggers-toolkit'), '"dom", "libxml"'),
        'badRequest' => __('Request not valid', 'academic-bloggers-toolkit'),
        'denied' => __('Site denied request', 'academic-bloggers-toolkit'),
        'fileExtensionError' => __('Invalid file extension. Extension must be .ris, .bib, or .bibtex', 'academic-bloggers-toolkit'),
        'filetypeError' => __('The selected file could not be processed', 'academic-bloggers-toolkit'),
        'identifiersNotFound' => array(
            'all' => __('No identifiers could be found for your request', 'academic-bloggers-toolkit'),
            'some' => __('The following identifiers could not be found', 'academic-bloggers-toolkit'),
        ),
        'networkError' => __('Network Error', 'academic-bloggers-toolkit'),
        'noResults' => __('Your search returned 0 results', 'academic-bloggers-toolkit'),
        'prefix' => __('Error', 'academic-bloggers-toolkit'),
        'risLeftovers' => __('The following references were unable to be processed', 'academic-bloggers-toolkit'),
        'statusError' => __('Request returned a non-200 status code', 'academic-bloggers-toolkit'),
        'warnings' => array(
            'warning' => __('Warning', 'academic-bloggers-toolkit'),
            'reason' => __('Reason', 'academic-bloggers-toolkit'),
            'noBib' => __('No bibliography format exists for your citation type', 'academic-bloggers-toolkit'),
        ),
        'unexpected' => array(
            'message' => __('An unexpected error occurred', 'academic-bloggers-toolkit'),
            'reportInstructions' => sprintf(__('Please report this error, including the steps taken to trigger it, here: %s', 'academic-bloggers-toolkit'), "\nhttps://github.com/dsifford/academic-bloggers-toolkit/issues"),
        ),
    );

    $ABT_i18n->referenceList = array(
        'menu' => array(
            'styleLabels' => array(
                'custom' => __('Custom Style', 'academic-bloggers-toolkit'),
                'predefined' => __('Pre-defined Styles', 'academic-bloggers-toolkit'),
            ),
            'toggleLabel' => __('Toggle menu', 'academic-bloggers-toolkit'),
            'tooltips' => array(
                'destroy' => __('Delete all references', 'academic-bloggers-toolkit'),
                'help' => __('Usage instructions', 'academic-bloggers-toolkit'),
                'importRIS' => __('Import references', 'academic-bloggers-toolkit'),
                'refresh' => __('Refresh reference list', 'academic-bloggers-toolkit'),
                'staticPubList' => __('Insert static publication list', 'academic-bloggers-toolkit'),
            ),
        ),
        'citedItems' => __('Cited Items', 'academic-bloggers-toolkit'),
        'tooltips' => array(
            'add' => __('Add reference', 'academic-bloggers-toolkit'),
            'insert' => __('Insert selected references', 'academic-bloggers-toolkit'),
            'pin' => __('Pin reference list', 'academic-bloggers-toolkit'),
            'remove' => __('Remove selected references', 'academic-bloggers-toolkit'),
        ),
        'uncitedItems' => __('Uncited Items', 'academic-bloggers-toolkit'),
    );

    $ABT_i18n->dialogs->closeLabel = __('Close dialog', 'academic-bloggers-toolkit');

    $ABT_i18n->dialogs->edit = array(
        'title' => __('Edit Reference', 'academic-bloggers-toolkit'),
        'confirm' => __('Confirm', 'academic-bloggers-toolkit'),
    );

    $ABT_i18n->dialogs->import = array(
        'importBtn' => __('Import', 'academic-bloggers-toolkit'),
        'title' => __('Import References', 'academic-bloggers-toolkit'),
        'upload' => __('Choose File', 'academic-bloggers-toolkit'),
    );

    $ABT_i18n->dialogs->pubmed = array(
        'addReference' => __('Select', 'academic-bloggers-toolkit'),
        'next' => __('Next', 'academic-bloggers-toolkit'),
        'previous' => __('Previous', 'academic-bloggers-toolkit'),
        'search' => __('Search', 'academic-bloggers-toolkit'),
        'title' => __('Search PubMed', 'academic-bloggers-toolkit'),
        'viewReference' => __('View', 'academic-bloggers-toolkit'),
    );

    $ABT_i18n->dialogs->add = array(
        'buttonRow' => array(
            'addManually' => __('Add Manually', 'academic-bloggers-toolkit'),
            'addReference' => __('Add Reference', 'academic-bloggers-toolkit'),
            'addWithIdentifier' => __('Add with Identifier', 'academic-bloggers-toolkit'),
            'insertInline' => __('Insert citation inline', 'academic-bloggers-toolkit'),
            'searchPubmed' => __('Search PubMed', 'academic-bloggers-toolkit'),
        ),
        'identifierInput' => array(
            'label' => __('DOI/PMID/PMCID', 'academic-bloggers-toolkit'),
        ),
        'manualEntryContainer' => array(
            'autocite' => __('Autocite', 'academic-bloggers-toolkit'),
            'citationType' => __('Citation Type', 'academic-bloggers-toolkit'),
            'ISBN' => __('ISBN', 'academic-bloggers-toolkit'),
            'search' => __('Search', 'academic-bloggers-toolkit'),
            'URL' => __('URL', 'academic-bloggers-toolkit'),
        ),
        'people' => array(
            'add' => __('Add Contributor', 'academic-bloggers-toolkit'),
            'contributors' => __('Contributors', 'academic-bloggers-toolkit'),
            'given' => __('Given Name, M.I.', 'academic-bloggers-toolkit'),
            'surname' => __('Surname', 'academic-bloggers-toolkit'),
        ),
        'title' => __('Add References', 'academic-bloggers-toolkit'),
    );

    require_once __DIR__ . '/fieldmaps.php';

    return $ABT_i18n;
}
