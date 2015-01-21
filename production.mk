mica_version=1.0-dev
mica_branch=7.x-1.x
drupal_org_mica=git.drupal.org:project/obiba_mica.git

drupal_version = 7.32

#
# Mysql db access
#
db_name = mica2
db_user = mica2

www_path = /var/www
www_files_path = /usr/share/mica-files
target_path = $(www_files_path)/target
installation_path = /root
mica_client_path = $(installation_path)/mica-drupal7-client
mlstr-seed_path = $(installation_path)/mlstr-seed

help:
	@echo
	@echo "Mica Drupal 7 Client"
	@echo
	@echo "Available make targets:"
	@echo "  all          : Clean & setup Drupal with a symlink to Mica modules in target directory and import drupal.sql"
	@echo "  setup-drupal : Setup Drupal with Mica modules in target directory"
	@echo

all-new-prod: create-shared-folder setup-drupal-prod www-prod import-sql-prod settings-prod bootstrap-prod enable-mica-prod enable-obiba-auth-prod devel-prod jquery_update-prod datatables-prod cc-prod
update-prod: clean-prod setup-drupal-prod www-prod settings-prod bootstrap-prod enable-mica-prod enable-obiba-auth-prod devel-prod jquery_update-prod datatables-prod cc-prod

create-shared-folder:
	if test -d $(www_files_path) ; then echo "Directory -files- exist"; else mkdir /usr/share/mica-files; fi

clean-prod:
	rm -rf $(target_path)

setup-drupal-prod:
	drush make --prepare-install $(mica_client_path)/drupal/dev/drupal-basic.make $(target_path) && \
	chmod -R a+w $(target_path) && \
	cp -R $(mica_client_path)/drupal/modules/obiba_mica $(target_path)/sites/all/modules && \
	cp -R $(mica_client_path)/drupal/themes/obiba_bootstrap $(target_path)/sites/all/themes && \
	git clone https://github.com/obiba/drupal7-auth.git $(target_path)/sites/all/modules/obiba_auth && \
	git clone https://github.com/obiba/drupal7-protobuf.git  $(target_path)/sites/all/modules/obiba_protobuf && \
	chown -R www-data:www-data  $(www_files_path) && \
	chmod -R 744 $(www_files_path)

www-prod:
	rm -f $(www_path)/mica2 && \
	ln -s $(target_path) $(www_path)/mica2 && \
	chown -R www-data:www-data $(www_path)/mica2 && \
	rm -r $(www_path)/mica2/sites/default/files && \
	if test -d $(www_files_path)/site-files ; then echo "Directory -files- exist"; else mkdir $(www_files_path)/site-files; fi &&\
	ln -s $(www_files_path)/site-files $(www_path)/mica2/sites/default/files && \
	chown -R www-data:www-data $(www_path)/mica2/sites/default/files && \
	chmod -R a+w /$(www_path)/mica2/sites/default/files

dump-sql-prod:
	mysqldump -u $(db_user) --password=$(db_pass) --hex-blob $(db_name) --result-file="$(mica_client_path)/drupal/dev/drupal-$(drupal_version).sql"

create-sql-prod:
	mysql -u $(db_user) --password=$(db_pass) -e "drop database if exists $(db_name); create database $(db_name);"

import-sql-prod: create-sql-prod
	mysql -u $(db_user) --password=$(db_pass) $(db_name) < "$(mica_client_path)/drupal/dev/drupal-$(drupal_version).sql"

settings-prod:
	sed  's/@db_pass@/$(db_pass)/g' $(CURDIR)/mica/settings-prod.php > $(target_path)/sites/default/settings.php
	cp $(CURDIR)/mica/.htaccess-prod $(target_path)/.htaccess

enable-mica-prod:
	cd $(target_path) && \
	drush en -y obiba_mica

enable-obiba-auth-prod:
	cd $(target_path) && \
	drush en -y obiba_auth

bootstrap-prod:
	cd $(target_path) && \
	drush dl -y bootstrap && \
	drush en -y bootstrap && \
	drush en -y obiba_bootstrap && \
	drush vset -y theme_default obiba_bootstrap && \
	drush vset -y admin_theme seven

less-css-prod:
	lessc $(mica_client_path)/drupal/themes/obiba_bootstrap/less/style.less $(mica_client_path)/drupal/themes/obiba_bootstrap/css/style.css

jquery_update-prod:
	cd $(target_path) && \
	drush dl -y jquery_update && \
	drush en -y jquery_update && \
	drush vset -y jquery_update_jquery_version 1.8 && \
	drush vset -y jquery_update_jquery_admin_version 1.8

devel-prod:
	cd $(target_path) && \
	drush dl -y devel && \
	drush en -y devel

cas-prod:
	cd $(target_path) && \
	drush dl -y cas && \
	drush en -y cas

chart-enable-prod:
	cd $(target_path) && \
	drush highcharts-download && \
	drush en -y charts_highcharts

datatables-prod: datatables-download-prod datatables-plugins-download-prod

datatables-download-prod:
	cd $(target_path) && \
	drush datatables-download


datatables-plugins-download-prod:
	cd $(target_path) && \
	drush datatables-plugins-download


cc-prod:
	cd $(target_path) && drush vset --exact mica_url https://172.17.42.1:8845 && drush cc all