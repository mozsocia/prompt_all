1. first create a blank model in backend like "aboutus.js" for "about us" page, then give the ai the blank model with site page (about us) page (blade/next js page) , then ask the ai to create the model for that page to it dynamic

2. for sql do not make nested object in model(for naming convention see below model examples), for mongoose it can make nested object in model




--- 
## naming convention 

**sql:**
    ABOUT_US_SCHEMA = [
        'id' => ['type' => 'bigint', 'unsigned' => true, 'auto_increment' => true, 'primary' => true],

        // Hero Section
        'hero_section_title' => ['type' => 'string', 'nullable' => true],
        'hero_section_subtitle' => ['type' => 'text', 'nullable' => true],

        // Story Section
        'story_section_title' => ['type' => 'string', 'nullable' => true],
        'story_section_paragraph_1' => ['type' => 'text', 'nullable' => true],
        'story_section_paragraph_2' => ['type' => 'text', 'nullable' => true],
        'story_section_image' => ['type' => 'string', 'nullable' => true],
        'story_section_stat_number' => ['type' => 'string', 'nullable' => true],
        'story_section_stat_label' => ['type' => 'string', 'nullable' => true],

        // Values Section
        'values_section_title' => ['type' => 'string', 'nullable' => true],
        'values_section_value_1_icon' => ['type' => 'string', 'nullable' => true],
        'values_section_value_1_title' => ['type' => 'string', 'nullable' => true],
        'values_section_value_1_description' => ['type' => 'text', 'nullable' => true],
        'values_section_value_2_icon' => ['type' => 'string', 'nullable' => true],
        'values_section_value_2_title' => ['type' => 'string', 'nullable' => true],
        'values_section_value_2_description' => ['type' => 'text', 'nullable' => true],
        'values_section_value_3_icon' => ['type' => 'string', 'nullable' => true],
        'values_section_value_3_title' => ['type' => 'string', 'nullable' => true],
        'values_section_value_3_description' => ['type' => 'text', 'nullable' => true],

        // Stats Section
        'stats_section_stat_1_value' => ['type' => 'string', 'nullable' => true],
        'stats_section_stat_1_label' => ['type' => 'string', 'nullable' => true],
        'stats_section_stat_2_value' => ['type' => 'string', 'nullable' => true],
        'stats_section_stat_2_label' => ['type' => 'string', 'nullable' => true],
        'stats_section_stat_3_value' => ['type' => 'string', 'nullable' => true],
        'stats_section_stat_3_label' => ['type' => 'string', 'nullable' => true],
        'stats_section_stat_4_value' => ['type' => 'string', 'nullable' => true],
        'stats_section_stat_4_label' => ['type' => 'string', 'nullable' => true],

        // Why Choose Us Section
        'why_choose_us_section_title' => ['type' => 'string', 'nullable' => true],
        'why_choose_us_section_reason_1_icon' => ['type' => 'string', 'nullable' => true],
        'why_choose_us_section_reason_1_title' => ['type' => 'string', 'nullable' => true],
        'why_choose_us_section_reason_1_description' => ['type' => 'text', 'nullable' => true],
        'why_choose_us_section_reason_2_icon' => ['type' => 'string', 'nullable' => true],
        'why_choose_us_section_reason_2_title' => ['type' => 'string', 'nullable' => true],
        'why_choose_us_section_reason_2_description' => ['type' => 'text', 'nullable' => true],
        'why_choose_us_section_reason_3_icon' => ['type' => 'string', 'nullable' => true],
        'why_choose_us_section_reason_3_title' => ['type' => 'string', 'nullable' => true],
        'why_choose_us_section_reason_3_description' => ['type' => 'text', 'nullable' => true],

        // CTA Section
        'cta_section_title' => ['type' => 'string', 'nullable' => true],
        'cta_section_subtitle' => ['type' => 'text', 'nullable' => true],

        'created_at' => ['type' => 'timestamp', 'nullable' => true],
        'updated_at' => ['type' => 'timestamp', 'nullable' => true],
    ];

---
