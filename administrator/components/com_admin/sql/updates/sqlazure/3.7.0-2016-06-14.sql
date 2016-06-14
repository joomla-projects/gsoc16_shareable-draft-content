CREATE TABLE [#__share_draft] (
	[id] [int] NOT NULL AUTO_INCREMENT,
	[title] [nvarchar](255) NOT NULL,
	[created] [datetime] NOT NULL,
	[modified] [datetime] NOT NULL,
	[sharelink] [nvarchar](255) NOT NULL,
        CONSTRAINT [PK_#__id] PRIMARY KEY CLUSTERED
    (
      [id] ASC
    )
) ON [PRIMARY];