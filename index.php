<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section" id="particles-js">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_title', 'Empowering Humanity, One Cloud at a Time')); ?></h1>
            <p class="hero-subtitle">Secure, Scalable, and Global Cloud Infrastructure</p>
            <div class="hero-buttons">
                <a href="#pricing" class="btn btn-primary">Get Started</a>
                <a href="#pricing" class="btn btn-secondary">View Pricing</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Our Services', 'sakuracloudid'); ?></h2>
            <div class="services-grid">
                <?php
                $services = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                if ($services->have_posts()) :
                    while ($services->have_posts()) : $services->the_post();
                ?>
                    <div class="service-card" data-aos="fade-up">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-icon">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="service-title"><?php the_title(); ?></h3>
                        <div class="service-description">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="pricing-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Pricing Plans', 'sakuracloudid'); ?></h2>
            <div class="pricing-grid">
                <!-- Standard Plan -->
                <div class="pricing-card" data-aos="fade-up">
                    <h3 class="plan-name">Standard</h3>
                    <div class="plan-price">
                        <span class="currency">$</span>
                        <span class="amount">5</span>
                        <span class="period">/month</span>
                    </div>
                    <ul class="plan-features">
                        <li>1 vCPU</li>
                        <li>1GB RAM</li>
                        <li>20GB SSD</li>
                        <li>1TB Transfer</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Get Started</a>
                </div>

                <!-- Pro Plan -->
                <div class="pricing-card featured" data-aos="fade-up" data-aos-delay="100">
                    <div class="featured-label">Most Popular</div>
                    <h3 class="plan-name">Pro</h3>
                    <div class="plan-price">
                        <span class="currency">$</span>
                        <span class="amount">20</span>
                        <span class="period">/month</span>
                    </div>
                    <ul class="plan-features">
                        <li>2 vCPU</li>
                        <li>4GB RAM</li>
                        <li>80GB SSD</li>
                        <li>2TB Transfer</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Get Started</a>
                </div>

                <!-- Enterprise Plan -->
                <div class="pricing-card" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="plan-name">Enterprise</h3>
                    <div class="plan-price">
                        <span class="amount">Custom</span>
                    </div>
                    <ul class="plan-features">
                        <li>Dedicated Resources</li>
                        <li>Custom RAM</li>
                        <li>Custom Storage</li>
                        <li>Unlimited Transfer</li>
                    </ul>
                    <a href="#contact" class="btn btn-primary">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <h2 class="section-title"><?php esc_html_e('Contact Us', 'sakuracloudid'); ?></h2>
            <div class="contact-wrapper">
                <div class="contact-form">
                    <?php 
                    if (shortcode_exists('contact-form-7')) {
                        echo do_shortcode('[contact-form-7 id="1234" title="Contact form 1"]');
                    } else {
                        // Fallback contact form
                        ?>
                        <form class="default-contact-form" action="#" method="post">
                            <div class="form-group">
                                <label for="name"><?php esc_html_e('Name', 'sakuracloudid'); ?></label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><?php esc_html_e('Email', 'sakuracloudid'); ?></label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message"><?php esc_html_e('Message', 'sakuracloudid'); ?></label>
                                <textarea id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <?php esc_html_e('Send Message', 'sakuracloudid'); ?>
                            </button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
