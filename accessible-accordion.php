<?php

/**
 * Template for the Accessible Accordion block
 * HTML code borrowed and updated from https://www.w3.org/WAI/ARIA/apg/patterns/accordion/examples/accordion/
 */

// Ensure ACF is available
if (!function_exists('get_field')) {
    return;
}

// Generate a unique ID for this block instance
$block_id = uniqid('accordionBlock_');

// Get ACF fields
$accordion_heading_type = get_field('accordion_heading_type'); // Heading type (H2, H3, H4, H5, H6)
$accordion_tabs = get_field('accordion_tabs'); // Repeater field for accordion tabs

if (!empty($accordion_tabs)) :
?>

    <div id="<?php echo esc_attr($block_id); ?>" class="accordion">

        <?php foreach ($accordion_tabs as $index => $tab) : ?>

            <?php
            // Set heading tag based on ACF field value (Default to H3 if not set)
            $heading_tag = ($accordion_heading_type ? $accordion_heading_type : 'h3');
            $accordion_id = $block_id . '_accordion' . ($index + 1); // Unique ID for each accordion item
            ?>

            <div class="accordion-item">
                <<?php echo esc_html($heading_tag); ?> class="accordion-heading">
                    <button type="button" aria-expanded="false" class="accordion-trigger" aria-controls="sect<?php echo esc_attr($block_id . '_' . ($index + 1)); ?>" id="<?php echo esc_attr($accordion_id); ?>">
                        <span class="accordion-title">
                            <?php echo esc_html($tab['accordion_heading']); ?>
                            <span class="accordion-icon"></span>
                        </span>
                    </button>
                </<?php echo esc_html($heading_tag); ?>>

                <div id="sect<?php echo esc_attr($block_id . '_' . ($index + 1)); ?>" role="region" aria-labelledby="<?php echo esc_attr($accordion_id); ?>" class="accordion-panel" hidden>
                    <?php echo wp_kses_post($tab['accordion_body']); ?>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

    <?php
    /*
     * Generating FAQ schema JSON based on accordion data.
     * You can test and validate the schema data at https://validator.schema.org/
     */
    // Generate FAQ schema JSON.
    $faq_schema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [],
    ];

    foreach ($accordion_tabs as $tab) {
        $faq_schema['mainEntity'][] = [
            '@type' => 'Question',
            'name' => $tab['accordion_heading'], // Accordion heading
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => wp_strip_all_tags($tab['accordion_body']), // Accordion body content without tags
            ],
        ];
    }

    // Output the FAQ schema JSON.
    ?>
    <script type="application/ld+json">
        <?php echo wp_json_encode($faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>

<?php endif; ?>