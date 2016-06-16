CREATE TABLE "#__share_draft" (
  "id" serial NOT NULL AUTO_INCREMENT,
  "articleId" integer NOT NULL,
  "title" character varying(255) NOT NULL,
  "created" datetime NOT NULL,
  "modified" character varying(255) NOT NULL,
  "sharelink" character varying(255) NOT NULL,
  PRIMARY KEY ("id")
);



