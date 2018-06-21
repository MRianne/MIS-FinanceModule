ACADEMIA (
	idno		pk
	fname		varchar
	lname		varchar
	mname		varchar
	course		varchar
	role		varchar
)

MEMBERS (
	idno*		pk - fk from ACADEMIA table
	sy*			pk - fk from school_year table
	term		int
	p_id		fk from designation table
	date_added	timestamp
)

DESIGNATION (
	p_id		pk
	position 	varchar - adviser, jo, president, vp, treasurer
)

ACCOUNTS (
	idno*		pk - fk from members table
	username	varchar
	password	varchar
	photo 		varchar link to profile pic
	type 		fk from account_type table
	status		tinyint 1 or 0
)

ACCOUNT_TYPE (
	type 			pk
	account_desc 	varchar admin, president/adviser, vice president, jo, member
)

SCHOOL_YEAR (sy*, status)

TRANSACTION (
	ref_id		pk
	type_id		fk from type table
	amount		float
	date_added	timestamp
	remarks		varchar
	sy 			fk from school_year table
	term		tinyint 1, 2 or 3
)

EXPENSE (
	ref_id		pk
	type_id		fk from type table
	amount		float
	date_added	timestamp
	purpose		varchar
	sy 			fk from school_year table
	term		tinyint 1, 2 or 3
)


TYPE (
	type_id		pk
	type_name	varchar
)


EVENTS (
	event_id*	pk
	event_desc	varchar
	venue		varchar
	proponents	varchar
	start_date	date
	end_date	date
	start_time	time
	end_time	time
	status		varchar
	idno		fk from account
)

PARTICIPANTS (
	event_id*	fk from events
	idno*		fk from academia
	timestamp
)

PARTICIPANTS_2 (
	event_id*	fk from events
	email*		varchar input from participants
	lname		varchar
	fname		varchar
	mname		varchar
	school 		varchar
)





MODULES
	Membership
		- add members by idno (and update accounts automatically)
		- add academia
		- reports of members
			- by year, by term
			- by offiers per year
			- by members

	Accounts
		- add account (by idno)
		- edit account
		- deactivate/activate account
		- reports
			- by year
			- by offiers per year
			- by members

	Events
		- manage event (create, update, delete - if not yet conducted)
		- view events
			- by date
			- by year, term
			- by proponents
		- registration link for internal and external (if approved)
		- reports (participants of events)

	Finance
		- add transaction (expense, profit)
		- reports
			- by term, year
			- by type

	Mobile
		- Login
		- Members
			- View current officers and other members
			- Message peers (group chat for all members - per sy)
			- Direct message officers
		- Officer
			- Add announcements
			- Direct message to members

