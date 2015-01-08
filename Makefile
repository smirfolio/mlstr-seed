# opal and mica servers
opal_url=https://localhost:8443
mica_url=https://localhost:8445
username=administrator
password=password

# database name in opal
database=opal_data

help:
	@echo "Seed Opal and Mica servers with Maelstrom data. Requires opal and mica python clients to be installed."
	@echo "Targets:"
	@echo "* make all (Seed opal and mica servers)"
	@echo "* make seed-opal (Seed opal server)"
	@echo "* make seed-mica (Seed mica server)"

all: seed-opal seed-mica

seed-mica: seed-studies seed-datasets

seed-studies:
	mica import-zip -mk $(mica_url) -u $(username) -p $(password) -pub ./mica/studies

seed-datasets: seed-study-datasets seed-harmonization-datasets

seed-study-datasets: seed-study-datasets-cls seed-study-datasets-frele seed-study-datasets-lbls seed-study-datasets-nuage seed-study-datasets-ulsam

seed-study-datasets-cls:
	$(call dataset-create,study,cls-wave1)
	$(call dataset-create,study,cls-wave2)
	$(call dataset-create,study,cls-wave3)
	$(call dataset-create,study,cls-wave4)

seed-study-datasets-frele:
	$(call dataset-create,study,frele)

seed-study-datasets-lbls:
	$(call dataset-create,study,lbls-1978)
	$(call dataset-create,study,lbls-1981)
	$(call dataset-create,study,lbls-1994)
	$(call dataset-create,study,lbls-1997)
	$(call dataset-create,study,lbls-2000)
	$(call dataset-create,study,lbls-2003)
	$(call dataset-create,study,lbls-2008)

seed-study-datasets-nuage:
	$(call dataset-create,study,nuage-t1)
	$(call dataset-create,study,nuage-t2)
	$(call dataset-create,study,nuage-t3)
	$(call dataset-create,study,nuage-t4)

seed-study-datasets-ulsam:
	$(call dataset-create,study,ulsam-50)
	$(call dataset-create,study,ulsam-60)
	$(call dataset-create,study,ulsam-70)
	$(call dataset-create,study,ulsam-77)
	$(call dataset-create,study,ulsam-82)
	$(call dataset-create,study,ulsam-88)

seed-harmonization-datasets:
	$(call dataset-create,harmonization,cptp-coreqx)
	$(call dataset-create,harmonization,asthma-respiratory-dataschema)
	$(call dataset-create,harmonization,cptp-dataschema)
	$(call dataset-create,harmonization,functional-somatic-symptoms-dataschema)
	$(call dataset-create,harmonization,healthy-obese-project-dataschema)
	$(call dataset-create,harmonization,physical-activity-healthy-aging-dataschema)
	$(call dataset-create,harmonization,retrospective-generic-dataschema)

seed-opal: seed-project seed-tables

seed-project:
	$(call project-create,CPTP_CoreQx)
	$(call project-create,CLS)
	$(call project-create,FRELE)
	$(call project-create,LBLS)
	$(call project-create,NuAge)
	$(call project-create,ULSAM)
	$(call project-create,dataschemas)

seed-tables:
	$(call tables-import,CPTP_CoreQx)
	$(call tables-import,CLS)
	$(call tables-import,FRELE)
	$(call tables-import,LBLS)
	$(call tables-import,NuAge)
	$(call tables-import,ULSAM)
	$(call tables-import,dataschemas)

#
# Functions
#
project-create = sed 's/@database@/$(database)/g' ./opal/projects/project-template.json | sed 's/@name@/$(1)/g' | opal rest -o $(opal_url) -u $(username) -p $(password) -m POST /projects --content-type "application/json"

tables-import = opal file -o $(opal_url) -u $(username) -p $(password) -up ./opal/dictionaries/$(1).zip /tmp && \
	opal import-xml -o $(opal_url) -u $(username) -p $(password) -pa /tmp/$(1).zip -d $(1) && \
	while [ `opal rest -o $(opal_url) -u $(username) -p $(password) -m GET /shell/commands -j | grep -ch "NOT_STARTED\|IN_PROGRESS"` -gt 0 ] ; do echo -n "."; sleep 5; done; echo "."

dataset-create = mica rest -mk $(mica_url) -u $(username) -p $(password) -m POST /draft/$(1)-datasets --content-type "application/json" < ./mica/$(1)-datasets/$(2).json && \
	mica rest -mk $(mica_url) -u $(username) -p $(password) -m PUT /draft/$(1)-dataset/$(2)/_publish