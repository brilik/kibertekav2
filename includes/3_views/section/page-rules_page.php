<?php $s = get_field( 'rules_page' ); ?>
    <div class="rules" id="two-section">
        <div class="wrapper">
            <div class="notification">
                <h3><?= $s['title']; ?></h3>
                <div class="notification__txt"><?= $s['text']; ?></div>
            </div>
            <div class="rules__items">
                <div class="rules__item">
                    <div class="rules__title">
                        <span><?php _e( 'ОБЩИЕ ПОЛОЖЕНИЯ:', 'kiberteka' ); ?></span>
                        <div class="rules__title-btn js-toggle-btn">
                            <span class="rules__title-plus"></span>
                        </div>
                    </div>
                    <div class="rules__info js-toggle-info"><?= $s['general']; ?></div>
                </div>
                <div class="rules__item">
                    <div class="rules__title">
                        <span><?php _e( 'ПОСЕТИТЕЛЬ ИМЕЕТ ПРАВО:', 'kiberteka' ); ?></span>
                        <div class="rules__title-btn js-toggle-btn">
                            <span class="rules__title-plus"></span>
                        </div>
                    </div>
                    <div class="rules__info js-toggle-info"><?= $s['right']; ?></div>
                </div>
                <div class="rules__item">
                    <div class="rules__title">
                        <span><?php _e( 'ЗАПРЕЩАЕТСЯ:', 'kiberteka' ); ?></span>
                        <div class="rules__title-btn js-toggle-btn">
                            <span class="rules__title-plus"></span>
                        </div>
                    </div>
                    <div class="rules__info js-toggle-info"><?= $s['forbidden']; ?></div>
                </div>
            </div>
        </div>
    </div>
<?php unset( $s ); ?>