#!/bin/bash -e

lessc loffle/less/style.less loffle/style.css
zip -r homesyn Dockerfile Dockerrun.aws.json wp loffle fora newrelic.ini
