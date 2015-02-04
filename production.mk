mica_version=1.0-dev
mica_branch=7.x-1.x
drupal_org_mica=git.drupal.org:project/obiba_mica.git

drupal_version = 7.32

#
# Mysql db access
#
db_name = mica2
db_user = mica2
db_pass_internal = $(db_pass)

projects = $(HOME)/projects
seed_folders = mlstr-seed
git_mlstr_seed = https://github.com/maelstrom-research/mlstr-seed.git
git_mica_drupal_client = https://github.com/obiba/mica-drupal7-client.git

www_target_path = /var/www/mica2
www_files_path = /var/lib/mica2
WWW_folders_site_files = $(www_files_path)/site-files
WWW_folders_site_modules = $(www_files_path)/site-modules
source_seed_path = /root/$(seed_folders)
mica_client_path = $(source_seed_path)/mica-drupal7-client

theme_maelstrom_path = $(source_seed_path)/mica/maelstrom_bootstrap

help:
	@echo
	@echo "Obiba Mica Drupal 7 Client"
	@echo
	@echo "Available make targets:"
	@echo "  all-new-prod : Clean & setup Drupal with a symlink to Mica modules in target directory and import drupal.sql, please use parameter db_pass=<password database>"
	@echo "  update-prod : Update code Obiba_mica module  + maelstrom_bootstrap theme and update all require modules please use parameter db_pass=<password database>"
	@echo

all-new-prod: clean-prod www-prod import-sql-prod settings-prod enable-mica-prod enable-obiba-auth-prod bootstrap-prod jquery_update-prod devel-prod ctools-prod views-prod ckeditor-prod cas-prod chart-enable-prod datatables-prod cc-prod
update-prod: backup-current clean-prod www-prod dump-sql-prod import-sql-prod settings-prod enable-mica-prod enable-obiba-auth-prod bootstrap-prod jquery_update-prod devel-prod ctools-prod views-prod ckeditor-prod cas-prod chart-enable-prod datatables-prod cc-prod

backup-current:
	cd $(www_target_path) && \
	drush ard

clean-prod:
	rm -rf $(www_target_path)
	rm -rf $(mica_client_path)

setup-drupal-prod:
	git clone $(git_mica_drupal_client) $(mica_client_path) && \
	drush make --prepare-install $(mica_client_path)/drupal/dev/drupal-basic.make $(www_target_path) && \
	rm -r $(www_target_path)/sites/all/modules && \
	if test -d $(WWW_folders_site_modules) ; then echo "Directory -modules- exist"; else mkdir $(WWW_folders_site_modules); fi &&\
	ln -s $(WWW_folders_site_modules) $(www_target_path)/sites/all/modules && \
	chown -R www-data:www-data $(www_target_path)/sites/all/modules && \
	chmod -R a+w $(www_target_path)/sites/all/modules && \
	rm -rf $(www_target_path)/sites/all/themes/obiba_bootstrap && \
	rm -rf $(www_target_path)/sites/all/themes/maelstrom_bootstrap && \
	cp -R $(mica_client_path)/drupal/themes/obiba_bootstrap $(www_target_path)/sites/all/themes && \
	cp -R $(source_seed_path)/mica/maelstrom_bootstrap $(www_target_path)/sites/all/themes && \
	rm -r $(www_target_path)/sites/all/modules/obiba_auth && \
	rm -r $(www_target_path)/sites/all/modules/obiba_protobuf && \
	rm -r $(www_target_path)/sites/all/modules/obiba_mica && \
	cp -R $(mica_client_path)/drupal/modules/obiba_mica $(www_target_path)/sites/all/modules/ && \
	git clone https://github.com/obiba/drupal7-auth.git $(www_target_path)/sites/all/modules/obiba_auth && \
	git clone https://github.com/obiba/drupal7-protobuf.git $(www_target_path)/sites/all/modules/obiba_protobuf && \
	chown -R www-data:www-data  $(www_target_path) && \
	chmod -R 744 $(www_target_path)

www-prod: setup-drupal-prod
	rm -r $(www_target_path)/sites/default/files && \
	if test -d $(www_files_path) ; then echo "Directory -mica2- exist"; else mkdir $(www_files_path); fi &&\
	if test -d $(WWW_folders_site_files) ; then echo "Directory -files- exist"; else mkdir $(WWW_folders_site_files); fi &&\
	ln -s $(WWW_folders_site_files) $(www_target_path)/sites/default/files && \
	chown -R www-data:www-data $(www_target_path)/sites/default/files && \
	chmod -R a+w /$(www_target_path)/sites/default/files

dump-sql-prod:
	mysqldump -u $(db_user) --password=$(db_pass_internal) --hex-blob $(db_name) --result-file="$(mica_client_path)/drupal/dev/drupal-$(drupal_version).sql"

create-sql-prod:
	mysql -u $(db_user) --password=$(db_pass_internal) -e "drop database if exists $(db_name); create database $(db_name);"

import-sql-prod: create-sql-prod
	mysql -u $(db_user) --password=$(db_pass_internal) $(db_name) < "$(mica_client_path)/drupal/dev/drupal-$(drupal_version).sql"

settings-prod:
	sed  's/@db_pass@/$(db_pass_internal)/g' $(CURDIR)/mica/settings-prod.php > $(www_target_path)/sites/default/settings.php
	cp $(CURDIR)/mica/.htaccess-prod $(www_target_path)/.htaccess

enable-mica-prod:
	cd $(www_target_path) && \
	drush en -y obiba_mica

enable-obiba-auth-prod:
	cd $(www_target_path) && \
	drush en -y obiba_auth

bootstrap-prod:
	cd $(www_target_path) && \
	drush dl -y bootstrap && \
	drush en -y bootstrap && \
	drush en -y maelstrom_bootstrap && \
	drush vset -y theme_default maelstrom_bootstrap && \
	drush vset -y admin_theme seven

jquery_update-prod:
	cd $(www_target_path) && \
	drush dl -y jquery_update && \
	drush en -y jquery_update && \
	drush vset -y jquery_update_jquery_version 1.8 && \
	drush vset -y jquery_update_jquery_admin_version 1.8

devel-prod:
	cd $(www_target_path) && \
	drush dl -y devel && \
	drush en -y devel

ctools-prod:
	cd $(www_target_path) && \
	drush dl -y ctools && \
	drush en -y ctools


views-prod:
	cd $(www_target_path) && \
	drush dl -y views && \
	drush en -y views

ckeditor-prod:
	cd $(www_target_path) && \
	drush dl -y ckeditor && \
	drush en -y ckeditor

cas-prod:
	cd $(www_target_path) && \
	drush dl -y cas && \
	drush en -y cas

chart-enable-prod:
	cd $(www_target_path) && \
	drush highcharts-download && \
	drush en -y charts_highcharts

datatables-prod: datatables-download-prod datatables-plugins-download-prod

datatables-download-prod:
	cd $(www_target_path) && \
	drush cache-clear drush && \
	drush datatables-download


datatables-plugins-download-prod:
	cd $(www_target_path) && \
	drush datatables-plugins-download


cc-prod:
	cd $(www_target_path) && drush vset --exact mica_url https://172.17.42.1:8845 && drush cc all

theme-mael:
	cd $(projects)/mica-drupal7-client/target/drupal &&\
	drush vset -y theme_default maelstrom_bootstrap

theme-obiba:
	cd $(projects)/mica-drupal7-client/target/drupal &&\
	drush vset -y theme_default obiba_bootstrap
