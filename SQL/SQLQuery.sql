CREATE TABLE [DBO].[ACW]
(
	[ID] int Identity (1,1),
	[Student_ID]	INT NOT NULL, 
    [Forename]		VARCHAR(30) NOT NULL, 
    [Surname]		VARCHAR(30) NOT NULL, 
    [Location]		VARCHAR(50) NOT NULL, 
	[UserType]		VARCHAR(7) NOT NULL,
    [Date]			DATETIME2(0) NOT NULL,
	PRIMARY KEY		(ID)

)