#!/bin/bash -e

zip -r homesyn Dockerfile Dockerrun.aws.json nginx/entrypoint nginx/update.sh .ebextensions
