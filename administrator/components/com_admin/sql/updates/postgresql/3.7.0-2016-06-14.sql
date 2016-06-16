CREATE TABLE "#__share_draft" (
  "id" serial NOT NULL,
  "articleId" integer NOT NULL,
  "title" varchar(255) DEFAULT NOT NULL,
  "created" timestamp without time zone DEFAULT '1970-01-01 00:00:00'  NOT NULL,
  "modified" timestamp without time zone DEFAULT '1970-01-01 00:00:00'  NOT NULL,
  "sharetoken" varchar(255) DEFAULT NOT NULL,
  PRIMARY KEY ("id")
);
