<?php
/**
 * CMS Pico - Create websites using Pico CMS for Nextcloud.
 *
 * @copyright Copyright (c) 2017, Maxence Lange (<maxence@artificial-owl.com>)
 * @copyright Copyright (c) 2019, Daniel Rudolf (<picocms.org@daniel-rudolf.de>)
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

use OCA\CMSPico\AppInfo\Application;

script(Application::APP_NAME, 'admin');
style(Application::APP_NAME, 'admin');

?>

<article class="section">
	<h2><?php p($l->t('Custom themes')); ?></h2>
	<p class="settings-hint"><?php p($l->t(
		'Add custom themes for greater individuality and style.'
	)); ?></p>

	<div class="message">
		<div class="icon icon-info"></div>
		<div>
			<p><?php p($l->t(
				'Pico CMS for Nextcloud allows you to add custom themes for some greater individuality and '
				. 'style. However, for security reasons, users can\'t add custom themes on their own. Before you '
				. 'can add a new custom theme using the "Add custom theme" button below, you\'ll have to upload all '
				. 'of its files to the data folder of your Nextcloud instance. After uploading the theme it will show '
				. 'up in the form below to actually allow users to use the custom theme.'
			)); ?></p>
			<p><?php p($l->t(
				'Before adding a new custom theme, upload all of the theme\'s files to a new folder in the '
					. 'following directory:'
			)); ?>
			<p class="followup indent"><code><?php p($_['themesPath']); ?></code></p>
		</div>
	</div>

	<section id="picocms-themes" class="picocms-admin"
			data-route="/apps/cms_pico/admin/themes"
			data-template="#picocms-themes-template"
			data-system-template="#picocms-themes-template-system-item"
			data-custom-template="#picocms-themes-template-custom-item"
			data-new-template="#picocms-themes-template-new-item"
			data-loading-template="#picocms-themes-template-loading"
			data-error-template="#picocms-themes-template-error"
			data-new-button=".app-content-list-add button"
			data-new-item=".app-content-list-add select"
			data-reload-button=".app-content-list-add .icon-history"
			data-delete-item-button=".icon-delete">
		<div class="app-content-loading message">
			<div class="icon loading"></div>
			<div>
				<p><?php p($l->t('Loading themes…')); ?></p>
			</div>
		</div>
	</section>

	<script id="picocms-themes-template" type="text/template"
			data-replaces="#picocms-themes">
		<div class="app-content-list">
			<div class="app-content-list-item app-content-list-add">
				<div class="app-content-list-item-line-one">
					<select></select>
					<button data-toggle="tooltip" data-placement="bottom"
							title="<?php p($l->t('Add custom theme')); ?>">
						<span class="icon icon-add"></span>
					</button>
				</div>
				<div class="icon-history" data-toggle="tooltip" data-placement="left"
						title="<?php p($l->t('Reload themes list')); ?>"></div>
			</div>
		</div>
	</script>

	<script id="picocms-themes-template-system-item" type="text/template"
			data-append-to="#picocms-themes > .app-content-list">
		<div class="app-content-list-item">
			<div class="app-content-list-item-line-one">
				<p>{name}</p>
				<p class="note"><?php p($l->t('System theme')); ?></p>
			</div>
		</div>
	</script>

	<script id="picocms-themes-template-custom-item" type="text/template"
			data-append-to="#picocms-themes > .app-content-list">
		<div class="app-content-list-item">
			<div class="app-content-list-item-line-one">
				<p>{name}</p>
				<p class="note"><?php p($l->t('Custom theme')); ?></p>
			</div>
			<div class="icon-delete" data-toggle="tooltip" data-placement="left"
					title="<?php p($l->t('Delete custom theme')); ?>"></div>
		</div>
	</script>

	<script id="picocms-themes-template-new-item" type="text/template"
			data-append-to="#picocms-themes > .app-content-list > .app-content-list-add select">
		<option name="{name}">{name}</option>
	</script>

	<script id="picocms-themes-template-loading" type="text/template"
			data-replaces="#picocms-themes">
		<div class="app-content-loading message">
			<div class="icon loading"></div>
			<div>
				<p><?php p($l->t('Loading themes…')); ?></p>
			</div>
		</div>
	</script>

	<script id="picocms-themes-template-error" type="text/template"
			data-replaces="#picocms-themes">
		<div class="app-content-error message">
			<div class="icon icon-error-color"></div>
			<div>
				<p><?php p($l->t(
					'A unexpected error occured while performing this action. Please check Nextcloud\'s logs.'
				)); ?></p>
			</div>
		</div>
	</script>
</article>

<article class="section">
	<h2><?php p($l->t('Custom templates')); ?></h2>
	<p class="settings-hint"><?php p($l->t(
		'Make it easier for users to create new websites.'
	)); ?></p>

	<div class="message">
		<div class="icon icon-info"></div>
		<div>
			<p><?php p($l->t(
				'Creating new websites can be hard - where to even start? Custom templates act as a starting '
				. 'point for users to create a new website using Pico CMS for Nextcloud. Before adding a new custom '
				. 'template using the "Add custom template" button below, you must upload all of the template\'s '
				. 'files to the data folder of your Nextcloud instance. After uploading the plugin it will show up in '
				. 'the form below to actually add it to "Create website" form of your users.'
			)); ?></p>
			<p><?php p($l->t(
				'Before adding a new custom template, upload all of the template\'s files to a new folder in the '
				. 'following directory:'
			)); ?>
			<p class="followup indent"><code><?php p($_['templatesPath']); ?></code></p>
		</div>
	</div>

	<section id="picocms-templates" class="picocms-admin"
			data-route="/apps/cms_pico/admin/templates"
			data-template="#picocms-templates-template"
			data-system-template="#picocms-templates-template-system-item"
			data-custom-template="#picocms-templates-template-custom-item"
			data-new-template="#picocms-templates-template-new-item"
			data-loading-template="#picocms-templates-template-loading"
			data-error-template="#picocms-templates-template-error"
			data-new-button=".app-content-list-add button"
			data-new-item=".app-content-list-add select"
			data-reload-button=".app-content-list-add .icon-history"
			data-delete-item-button=".icon-delete">
		<div class="app-content-loading message">
			<div class="icon loading"></div>
			<div>
				<p><?php p($l->t('Loading templates…')); ?></p>
			</div>
		</div>
	</section>

	<script id="picocms-templates-template" type="text/template"
			data-replaces="#picocms-templates">
		<div class="app-content-list">
			<div class="app-content-list-item app-content-list-add">
				<div class="app-content-list-item-line-one">
					<select></select>
					<button data-toggle="tooltip" data-placement="bottom"
							title="<?php p($l->t('Add custom template')); ?>">
						<span class="icon icon-add"></span>
					</button>
				</div>
				<div class="icon-history" data-toggle="tooltip" data-placement="left"
						title="<?php p($l->t('Reload templates list')); ?>"></div>
			</div>
		</div>
	</script>

	<script id="picocms-templates-template-system-item" type="text/template"
			data-append-to="#picocms-templates > .app-content-list">
		<div class="app-content-list-item">
			<div class="app-content-list-item-line-one">
				<p>{name}</p>
				<p class="note"><?php p($l->t('System template')); ?></p>
			</div>
		</div>
	</script>

	<script id="picocms-templates-template-custom-item" type="text/template"
			data-append-to="#picocms-templates > .app-content-list">
		<div class="app-content-list-item">
			<div class="app-content-list-item-line-one">
				<p>{name}</p>
				<p class="note"><?php p($l->t('Custom template')); ?></p>
			</div>
			<div class="icon-delete" data-toggle="tooltip" data-placement="left"
					title="<?php p($l->t('Delete custom template')); ?>"></div>
		</div>
	</script>

	<script id="picocms-templates-template-new-item" type="text/template"
			data-append-to="#picocms-templates > .app-content-list > .app-content-list-add select">
		<option name="{name}">{name}</option>
	</script>

	<script id="picocms-templates-template-loading" type="text/template"
			data-replaces="#picocms-templates">
		<div class="app-content-loading message">
			<div class="icon loading"></div>
			<div>
				<p><?php p($l->t('Loading templates…')); ?></p>
			</div>
		</div>
	</script>

	<script id="picocms-templates-template-error" type="text/template"
			data-replaces="#picocms-templates">
		<div class="app-content-error message">
			<div class="icon icon-error-color"></div>
			<div>
				<p><?php p($l->t(
					'A unexpected error occured while performing this action. Please check Nextcloud\'s logs.'
				)); ?></p>
			</div>
		</div>
	</script>
</article>

<article class="section">
	<h2><?php p($l->t('Configure your webserver')); ?></h2>
	<p class="settings-hint"><?php p($l->t(
		'Enable Pico CMS for Nextcloud\'s full potential by configuring your webserver appropriately.'
	)); ?></p>

	<div class="message">
		<div class="icon icon-info"></div>
		<div>
			<p><?php p($l->t(
				'Depending on your webserver\'s configuration, users can access their websites using different '
				. 'URLs. By default, users can access their websites using Pico CMS for Nextcloud\'s full application '
				. 'URL. However, these URLs are pretty long and thus not very user-friendly. For this reason, Pico '
				. 'CMS for Nextcloud also supports shortened URLs utilizing the virtual "sites/" folder. However, '
				. 'using this feature requires some additional webserver configuration. If you\'re using the Apache '
				. 'webserver, try one of the first two examples shown below. If you\'re rather using the nginx '
				. 'webserver, try one of last two examples. If you don\'t really understand what\'s going on, contact '
				. 'your server administrator and send him the information below.'
			)); ?></p>
			<p><?php p($l->t(
				'If your server administrator tells you this isn\'t possible, don\'t despair - you can still use '
				. 'Pico CMS for Nextcloud\'s full application URLs, they always work out-of-the-box and look like the '
				. 'following:'
			)); ?>
			<p class="followup indent"><a><?php p($_['exampleFullUrl']); ?></a></p>
		</div>
	</div>

	<section class="lane">
		<header>
			<h3><?php p($l->t('Using Apache\'s mod_proxy')); ?></h3>
			<p>
				<?php p($l->t('Your users\' website URLs will look like the following:')); ?>
				<a><?php p($_['exampleProxyUrl']); ?></a>
			</p>
		</header>
		<section>
			<p class="code">
				<code>
					ProxyPass <?php p($_['internalPath']); ?> <?php p($_['internalProxyUrl']); ?><br/>
					ProxyPassReverse <?php p($_['internalPath']); ?> <?php p($_['internalProxyUrl']); ?><br/>
					<?php if (substr($_['internalProxyUrl'], 0, 5) === 'https') { ?>
						SSLProxyEngine on<br/>
					<?php } ?>
				</code>
			</p>
			<p><?php p($l->t(
				'Copy the config snippet above to Nextcloud\'s <VirtualHost …> section of your apache.conf. '
				. 'Before doing so you must enable both Apache\'s mod_proxy and mod_proxy_http modules. Otherwise '
				. 'your webserver will either refuse to (re)start or yield a 500 Internal Server Error.'
			)); ?></p>
		</section>
	</section>

	<section class="lane">
		<header>
			<h3><?php p($l->t('Using Apache\'s mod_rewrite')); ?></h3>
			<p>
				<?php p($l->t('Your users\' website URLs will look like the following:')); ?>
				<a><?php p($_['exampleFullUrl']); ?></a>
			</p>
		</header>
		<section>
			<p class="code">
				<code>
					RewriteEngine On<br/>
					RewriteRule ^<?php p(preg_quote($_['internalPath'])); ?>(.*)$ <?php p($_['internalFullUrl']); ?>$1 [QSA,L]<br/>
				</code>
			</p>
			<p><?php p($l->t(
				'Before copying the config snippet above to Nextcloud\'s <VirtualHost …> section of your '
				. 'apache.conf, make sure to enable Apache\'s mod_rewrite module. Otherwise your webserver will '
				. 'refuse to (re)start or yield a 500 Internal Server Error. Please note that this config won\'t '
				. 'actually let you use shortened URLs, it just redirects users from shortened URLs to the site\'s '
				. 'full URL. Thus you should prefer the solution utilizing mod_proxy shown above.'
			)); ?></p>
		</section>
	</section>

	<section class="lane">
		<header>
			<h3><?php p($l->t('Using nginx\'s proxy_pass')); ?></h3>
			<p>
				<?php p($l->t('Your users\' website URLs will look like the following:')); ?>
				<a><?php p($_['exampleProxyUrl']); ?></a>
			</p>
		</header>
		<section>
			<p class="code">
				<code>
					location <?php p($_['internalPath']); ?> {<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;proxy_set_header X-Forwarded-Host $host:$server_port;<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;proxy_set_header X-Forwarded-Server $host;<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;proxy_pass <?php p($_['internalProxyUrl']); ?>;<br/>
					}<br/>
				</code>
			</p>
			<p><?php p($l->t(
				'Copy the config snippet above to Nextcloud\'s server { … } section of your nginx.conf. Before '
				. 'doing so you must enable nginx\'s ngx_http_proxy_module module. Otherwise your webserver will '
				. 'either refuse to (re)start or yield a 500 Internal Server Error.'
			)); ?></p>
		</section>
	</section>

	<section class="lane">
		<header>
			<h3><?php p($l->t('Using nginx\'s rewrite')); ?></h3>
			<p>
				<?php p($l->t('Your users\' website URLs will look like the following:')); ?>
				<a><?php p($_['exampleFullUrl']); ?></a>
			</p>
		</header>
		<section>
			<p class="code">
				<code>
					rewrite ^<?php p(preg_quote($_['internalPath'])); ?>(.*)$ <?php p($_['internalFullUrl']); ?>$1 last;<br/>
				</code>
			</p>
			<p><?php p($l->t(
				'Simply copy the config snippet above to Nextcloud\'s server { … } section of your nginx.conf. '
				. 'Please note that this config won\'t actually let you use shortened URLs, it just redirects users '
				. 'from shortened URLs to the site\'s full URL. Thus you should prefer the solution utilizing '
				. 'nginx\'s proxy_pass directive shown above.'
			)); ?></p>
		</section>
	</section>
</article>
