<?php

error_reporting(0);



function phoneFormat($value) {

	$phoneEncoded = preg_replace("/[^0-9]/","",$value);

	$phoneEncoded = '+1 '.$phoneEncoded[0].$phoneEncoded[1].$phoneEncoded[2].'-'.$phoneEncoded[3].$phoneEncoded[4].$phoneEncoded[5].'-'.$phoneEncoded[6].$phoneEncoded[7].$phoneEncoded[8].$phoneEncoded[9];

	

	return $phoneEncoded; 

}

function phoneDeFormat($value) {

	$phoneDeFormat = str_replace('+1 ','',$value);

	$phoneDeFormat = preg_replace("/[^0-9]/","",$phoneDeFormat);

	

	return $phoneDeFormat; 

}

function AddressExperian($value) {

	if ($value == '0')

		return 'Undetermined';

	if ($value == '1') 

		return 'Single Family Dwelling';

	if ($value == '2')

		return 'Apartment with unit designator';

	if ($value == '3') 

		return 'Apartment without unit designator';

	if ($value == '4')

		return 'Rural Route';

	if ($value == '5')

		return 'Post Office Box';

		

	else 

		return 'Unknown'; 

}

function IncomeClassificationExperian($value) {

	if ($value == '1') 

		return 'Low Income';

	if ($value == '2')

		return 'Moderate Income';

	if ($value == '3') 

		return 'Middle Income';

	if ($value == '4')

		return 'High Income';

		

	else 

		return 'Unknown'; 

}

function DeliveryPointExperian($value) {

	if ($value == 'Y') 

		return 'Delivery point is a drop (No unit designator required - mail is dropped at a central location and distributed by non-postal personnel)';

	if ($value == 'N')

		return 'Delivery point is not a drop (address is not a multi-unit central drop pt or Commercial Mail Receiving facility)';

	if ($value == 'C') 

		return 'Commercial Drop  i.e. Mail Boxes Etc. type locations';



	else

		return 'Unknown';

}

function TimeZoneExperian($value) {

	if ($value == 'C') 

		return 'Central Time Zone';

	if ($value == 'E')

		return 'Eastern Time Zone';

	if ($value == 'H') 

		return 'Hawaii/Alaska Time Zone';

	if ($value == 'M') 

		return 'Mountain Time Zone';

	if ($value == 'P')

		return 'Pacific Time Zone';

	if ($value == 'U') 

		return 'Unknown';	



	else

		return 'Unknown';

}

function GenderCodeExperian($value) {

	if ($value == 'U') 

		return 'Unknown';

	if ($value == 'F')

		return 'Female';

	if ($value == 'M') 

		return 'Male';

		

	else

		return 'Unknown';

}

function HomeOwnerFlagExperian($value) {

	if ($value == 'V') 

		return 'Verified Home Owner';

	if ($value == 'H')

		return 'Highly Likely Home Owner';

	if ($value == 'P') 

		return 'Probably Home Owner';

		

	else

		return 'Unknown';

}

function HouseholdIncomeExperian($value) {

	if ($value == 'A') 

		return 'Under $10,000';

	if ($value == 'B')

		return '$10,000 - $14,999';

	if ($value == 'C') 

		return '$15,000 - $19,999';

	if ($value == 'D') 

		return '$20,000 - $24,999';

	if ($value == 'E')

		return '$25,000 - $29,999';

	if ($value == 'F') 

		return '$30,000 - $34,999';

	if ($value == 'G') 

		return '$35,000 - $39,999';

	if ($value == 'H')

		return '$40,000 - $44,999';

	if ($value == 'I') 

		return '$45,000 - $49,999';

	if ($value == 'J') 

		return '$50,000 - $54,999';

	if ($value == 'K')

		return '$55,000 - $59,999';

	if ($value == 'L') 

		return '$60,000 - $64,999';

	if ($value == 'M') 

		return '$65,000 - $74,999';

	if ($value == 'N')

		return '$75,000 - $99,999';

	if ($value == 'O') 

		return '$100,000 - $149,999';

	if ($value == 'P') 

		return '$150,000 - $174,999';

	if ($value == 'Q')

		return '$175,000 - $199,999';

	if ($value == 'R') 

		return '$200,000 - $249,999';

	if ($value == 'S') 

		return '$250,000 +';

		

	else

		return 'Unknown';

}

function NetWorthExperian($value) {

	if ($value == 'A') 

		return 'Less than $1';

	if ($value == 'B')

		return '$1 - $4,999';

	if ($value == 'C') 

		return '$5,000 - $9,999';

	if ($value == 'D') 

		return '$10,000 - $24,999';

	if ($value == 'E')

		return '$25,000 - $49,999';

	if ($value == 'F') 

		return '$50,000 - $99,999';

	if ($value == 'G') 

		return '$100,000 - $249,999';

	if ($value == 'H')

		return '$250,000 - $499,999';

	if ($value == 'I') 

		return 'Greater than $499,999';

		

	else

		return 'Unknown';

}

function CreditLinesExperian($value) {

	if ($value == '1') 

		return '1 Line of Credit';

	if ($value == '2')

		return '2 Line of Credit';

	if ($value == '3') 

		return '3 Line of Credit';

	if ($value == '4') 

		return '4 Line of Credit';

	if ($value == '5')

		return '5 Line of Credit';

	if ($value == '6') 

		return '6 Line of Credit';

	if ($value == '7') 

		return '7 Line of Credit';

	if ($value == '8')

		return '8 Line of Credit';

	if ($value == '9') 

		return '9 Line of Credit';

		

	else

		return 'Unknown';

}

function CreditRangeExperian($value) {

	if ($value == '1') 

		return '$101 - $300';

	if ($value == '2')

		return '$301 - $500';

	if ($value == '3') 

		return '$501 - $1,000';

	if ($value == '4') 

		return '$1,001 - $3,000';

	if ($value == '5')

		return '$3,001 - $5,000';

	if ($value == '6') 

		return '$5,001 - $9,999';

	if ($value == '7') 

		return 'Greater than $9,999';

	if ($value == '0')

		return '$0 - $100';



	else

		return 'Unknown';

}

function EducationExperian($value) {

	if ($value == 'A') 

		return 'Completed High School';

	if ($value == 'B')

		return 'Completed College';

	if ($value == 'C') 

		return 'Completed Graduate School';

	if ($value == 'D') 

		return 'Attended Vocational/Technical';

		

	else

		return 'Unknown';

}

function OccupationExperian($value) {

	if ($value == 'A') 

		return 'Professional / Technical';

	if ($value == 'B')

		return 'Administration / Managerial';

	if ($value == 'C') 

		return 'Sales / Service';

	if ($value == 'D') 

		return 'Clerical / White Collar';

	if ($value == 'E')

		return 'Craftsman / Blue Collar';

	if ($value == 'F') 

		return 'Student';

	if ($value == 'G') 

		return 'Homemaker';

	if ($value == 'H')

		return 'Retired';

	if ($value == 'I') 

		return 'Farmer';

	if ($value == 'J') 

		return 'Military';

	if ($value == 'K')

		return 'Religious';

	if ($value == 'L') 

		return 'Self Employed';

	if ($value == 'M') 

		return 'Self Employed - Professional / Technical';

	if ($value == 'N')

		return 'Self Employed - Administration / Managerial';

	if ($value == 'O') 

		return 'Self Employed - Sales / Service';

	if ($value == 'P') 

		return 'Self Employed - Clerical / White Collar';

	if ($value == 'Q')

		return 'Self Employed - Craftsman / Blue Collar';

	if ($value == 'R') 

		return 'Self Employed - Student';

	if ($value == 'S') 

		return 'Self Employed - Homemaker';

	if ($value == 'T') 

		return 'Self Employed - Retired';

	if ($value == 'U')

		return 'Self Employed - Other';

	if ($value == 'V') 

		return 'Educator';

	if ($value == 'W') 

		return 'Financial Professional';

	if ($value == 'Z')

		return 'Legal Professional';

	if ($value == 'Y') 

		return 'Medical Professional';

	if ($value == 'Z') 

		return 'Other';

	if ($value == 'T999')

		return 'Professional';

	if ($value == 'T998')

		return 'Architect';

	if ($value == 'T997')

		return 'Chemist';

	if ($value == 'T996')

		return 'Curator';

	if ($value == 'T995')

		return 'Engineer';

	if ($value == 'T994')

		return 'Engineer/Aerospace';

	if ($value == 'T993')

		return 'Engineer/Chemical';

	if ($value == 'T992')

		return 'Engineer/Civil';

	if ($value == 'T991')

		return 'Engineer/Electrical/Electronic';

	if ($value == 'T990')

		return 'Engineer/Field';

	if ($value == 'T989')

		return 'Engineer/Industrial';

	if ($value == 'T988')

		return 'Engineer/Mechanical';

	if ($value == 'T987')

		return 'Geologist';

	if ($value == 'T986')

		return 'HomeEconomist';

	if ($value == 'T985')

		return 'Legal/Attorney/Lawyer';

	if ($value == 'T984')

		return 'Librarian/Archivist';

	if ($value == 'T983')

		return 'MedicalDoctor/Physician';

	if ($value == 'T982')

		return 'Pastor';

	if ($value == 'T981')

		return 'Pilot';

	if ($value == 'T980')

		return 'Scientist';

	if ($value == 'T979')

		return 'Statistician/Actuary';

	if ($value == 'T978')

		return 'Veterinarian';

	if ($value == 'T899')

		return 'Computer';

	if ($value == 'T898')

		return 'ComputerOperator';

	if ($value == 'T897')

		return 'ComputerProgrammer';

	if ($value == 'T896')

		return 'Computer/SystemsAnalyst';

	if ($value == 'E799')

		return 'Executive/UpperManagement';

	if ($value == 'E798')

		return 'CEO/CFO/Chairman/CorpOfficer';

	if ($value == 'E797')

		return 'Comptroller';

	if ($value == 'E796')

		return 'Politician/Legislator/Diplomat';

	if ($value == 'E795')

		return 'President';

	if ($value == 'E794')

		return 'Treasurer';

	if ($value == 'E793')

		return 'VicePresident';

	if ($value == 'M699')

		return 'MiddleManagement';

	if ($value == 'M698')

		return 'AccountExecutive';

	if ($value == 'M697')

		return 'Director/ArtDirector';

	if ($value == 'M696')

		return 'Director/ExecutiveDirector';

	if ($value == 'M695')

		return 'Editor';

	if ($value == 'M694')

		return 'Manager';

	if ($value == 'M693')

		return 'Manager/AssistantManager';

	if ($value == 'M692')

		return 'Manager/BranchManager';

	if ($value == 'M691')

		return 'Manager/CreditManager';

	if ($value == 'M690')

		return 'Manager/DistrictManager';

	if ($value == 'M689')

		return 'Manager/DivisionManager';

	if ($value == 'M688')

		return 'Manger/GeneralManager';

	if ($value == 'M687')

		return 'Manager/MarketingManager';

	if ($value == 'M686')

		return 'Manager/OfficeManager';

	if ($value == 'M685')

		return 'Manager/PlantManager';

	if ($value == 'M684')

		return 'Manager/ProductManager';

	if ($value == 'M683')

		return 'Manager/ProjectManager';

	if ($value == 'M682')

		return 'Manager/PropertyManager';

	if ($value == 'M681')

		return 'Manager/RegionalManager';

	if ($value == 'M680')

		return 'Manager/SalesManager';

	if ($value == 'M679')

		return 'Manager/StoreManager';

	if ($value == 'M678')

		return 'Manager/TrafficManager';

	if ($value == 'M677')

		return 'Manager/WarehouseManager';

	if ($value == 'M676')

		return 'Planner';

	if ($value == 'M675')

		return 'Principal/Dean/Educator';

	if ($value == 'M674')

		return 'Superintendent';

	if ($value == 'M673')

		return 'Supervisor';

	if ($value == 'W599')

		return 'WhiteCollarWorker';

	if ($value == 'W598')

		return 'Accounting/Biller/Billingclerk';

	if ($value == 'W597')

		return 'Actor/Entertainer/Announcer';

	if ($value == 'W596')

		return 'Adjuster';

	if ($value == 'W595')

		return 'Administration/Management';

	if ($value == 'W594')

		return 'Advertising';

	if ($value == 'W593')

		return 'Agent';

	if ($value == 'W592')

		return 'Aide/Assistant';

	if ($value == 'W591')

		return 'Aide/Assistant/Executive';

	if ($value == 'W590')

		return 'Aide/Assistant/Office';

	if ($value == 'W589')

		return 'Aide/Assistant/School';

	if ($value == 'W588')

		return 'Aide/Assistant/Staff';

	if ($value == 'W587')

		return 'Aide/Assistant/Technical';

	if ($value == 'W586')

		return 'Analyst';

	if ($value == 'W585')

		return 'Appraiser';

	if ($value == 'W584')

		return 'Artist';

	if ($value == 'W583')

		return 'Auctioneer';

	if ($value == 'W582')

		return 'Auditor';

	if ($value == 'W581')

		return 'Banker';

	if ($value == 'W580')

		return 'Banker/LoanOffice';

	if ($value == 'W579')

		return 'Banker/LoanProcessor';

	if ($value == 'W578')

		return 'Bookkeeper';

	if ($value == 'W577')

		return 'Broker';

	if ($value == 'W576')

		return 'Broker/Stock/Trader';

	if ($value == 'W575')

		return 'Buyer';

	if ($value == 'W574')

		return 'Cashier';

	if ($value == 'W573')

		return 'Caterer';

	if ($value == 'W572')

		return 'Checker';

	if ($value == 'W571')

		return 'ClaimsExaminer/Rep/Adjudicator';

	if ($value == 'W570')

		return 'Clerk';

	if ($value == 'W569')

		return 'Clerk/File';

	if ($value == 'W568')

		return 'Collector';

	if ($value == 'W567')

		return 'Communications';

	if ($value == 'W566')

		return 'Conservation/Environment';

	if ($value == 'W565')

		return 'Consultant/Advisor';

	if ($value == 'W564')

		return 'Coordinator';

	if ($value == 'W563')

		return 'CustomerService/Representative';

	if ($value == 'W562')

		return 'Designer';

	if ($value == 'W561')

		return 'Detective/Investigator';

	if ($value == 'W560')

		return 'Dispatcher';

	if ($value == 'W559')

		return 'Draftsman';

	if ($value == 'W558')

		return 'Estimator';

	if ($value == 'W557')

		return 'Expeditor';

	if ($value == 'W556')

		return 'Finance';

	if ($value == 'W555')

		return 'FlightAttendant/Steward';

	if ($value == 'W554')

		return 'Florist';

	if ($value == 'W553')

		return 'GraphicDesigner/CommercialArtist';

	if ($value == 'W552')

		return 'Hostess/Host/Usher';

	if ($value == 'W551')

		return 'Insurance/Agent';

	if ($value == 'W550')

		return 'Insurance/Underwriter';

	if ($value == 'W549')

		return 'InteriorDesigner';

	if ($value == 'W548')

		return 'Jeweler';

	if ($value == 'W547')

		return 'Marketing';

	if ($value == 'W546')

		return 'Merchandiser';

	if ($value == 'W545')

		return 'Model';

	if ($value == 'W544')

		return 'Musician/Music/Dance';

	if ($value == 'W543')

		return 'Personnel/Recruiter/Interviewer';

	if ($value == 'W542')

		return 'Photography';

	if ($value == 'W541')

		return 'PublicRelations';

	if ($value == 'W540')

		return 'Publishing';

	if ($value == 'W539')

		return 'Purchasing';

	if ($value == 'W538')

		return 'QualityControl';

	if ($value == 'W537')

		return 'RealEstate/Realtor';

	if ($value == 'W536')

		return 'Receptionist';

	if ($value == 'W535')

		return 'Reporter';

	if ($value == 'W534')

		return 'Researcher';

	if ($value == 'W533')

		return 'Sales';

	if ($value == 'W532')

		return 'SalesClerk/Counterman';

	if ($value == 'W531')

		return 'Security';

	if ($value == 'W530')

		return 'Surveyor';

	if ($value == 'W529')

		return 'Technician';

	if ($value == 'W528')

		return 'Telemarketer/Telephone/Operator';

	if ($value == 'W527')

		return 'Teller/BankTeller';

	if ($value == 'W526')

		return 'Tester';

	if ($value == 'W525')

		return 'Transcripter/Translator';

	if ($value == 'W524')

		return 'TravelAgent';

	if ($value == 'W523')

		return 'UnionMember/Rep.';

	if ($value == 'W522')

		return 'WardClerk';

	if ($value == 'W521')

		return 'WaterTreatment';

	if ($value == 'W520')

		return 'Writer';

	if ($value == 'L499')

		return 'BlueCollarWorker';

	if ($value == 'L498')

		return 'AnimalTechnician/Groomer';

	if ($value == 'L497')

		return 'Apprentice';

	if ($value == 'L496')

		return 'Assembler';

	if ($value == 'L495')

		return 'Athlete/Professional';

	if ($value == 'L494')

		return 'Attendant';

	if ($value == 'L493')

		return 'AutoMechanic';

	if ($value == 'L492')

		return 'Baker';

	if ($value == 'L491')

		return 'Barber/Hairstylist/Beautician';

	if ($value == 'L490')

		return 'Bartender';

	if ($value == 'L489')

		return 'Binder';

	if ($value == 'L488')

		return 'Bodyman';

	if ($value == 'L487')

		return 'Brakeman';

	if ($value == 'L486')

		return 'Brewer';

	if ($value == 'L485')

		return 'Butcher/MeatCutter';

	if ($value == 'L484')

		return 'Carpenter/Furniture/Woodworking';

	if ($value == 'L483')

		return 'Chef/Butler';

	if ($value == 'L482')

		return 'ChildCare/DayCare/Babysitter';

	if ($value == 'L481')

		return 'Cleaner/Laundry';

	if ($value == 'L480')

		return 'Clerk/Deli';

	if ($value == 'L479')

		return 'Clerk/Produce';

	if ($value == 'L478')

		return 'Clerk/Stock';

	if ($value == 'L477')

		return 'Conductor';

	if ($value == 'L476')

		return 'Construction';

	if ($value == 'L475')

		return 'Cook';

	if ($value == 'L474')

		return 'Cosmetologist';

	if ($value == 'L473')

		return 'Courier/Delivery/Messenger';

	if ($value == 'L472')

		return 'Crewman';

	if ($value == 'L471')

		return 'Custodian';

	if ($value == 'L470')

		return 'Cutter';

	if ($value == 'L469')

		return 'DockWorker';

	if ($value == 'L468')

		return 'Driver';

	if ($value == 'L467')

		return 'Driver/BusDriver';

	if ($value == 'L466')

		return 'Driver/TruckDriver';

	if ($value == 'L465')

		return 'Electrician';

	if ($value == 'L464')

		return 'Fabricator';

	if ($value == 'L463')

		return 'FactoryWorkman';

	if ($value == 'L462')

		return 'Farmer/Dairyman';

	if ($value == 'L461')

		return 'Finisher';

	if ($value == 'L460')

		return 'Fisherman/Seaman';

	if ($value == 'L459')

		return 'Fitter';

	if ($value == 'L458')

		return 'FoodService';

	if ($value == 'L457')

		return 'Foreman/Crewleader';

	if ($value == 'L456')

		return 'Foreman/ShopForeman';

	if ($value == 'L455')

		return 'Forestry';

	if ($value == 'L454')

		return 'FoundryWorker';

	if ($value == 'L453')

		return 'Furrier';

	if ($value == 'L452')

		return 'Gardener/Landscaper';

	if ($value == 'L451')

		return 'Glazier';

	if ($value == 'L450')

		return 'Grinder';

	if ($value == 'L449')

		return 'Grocer';

	if ($value == 'L448')

		return 'Helper';

	if ($value == 'L447')

		return 'Housekeeper/Maid';

	if ($value == 'L446')

		return 'Inspector';

	if ($value == 'L445')

		return 'Installer';

	if ($value == 'L444')

		return 'Ironworker';

	if ($value == 'L443')

		return 'Janitor';

	if ($value == 'L442')

		return 'Journeyman';

	if ($value == 'L441')

		return 'Laborer';

	if ($value == 'L440')

		return 'Lineman';

	if ($value == 'L439')

		return 'Lithographer';

	if ($value == 'L438')

		return 'Loader';

	if ($value == 'L437')

		return 'Locksmith';

	if ($value == 'L436')

		return 'Machinist';

	if ($value == 'L435')

		return 'Maintenance';

	if ($value == 'L434')

		return 'Maintenance/Supervisor';

	if ($value == 'L433')

		return 'Mason/Brick/Etc.';

	if ($value == 'L432')

		return 'MaterialHandler';

	if ($value == 'L431')

		return 'Mechanic';

	if ($value == 'L430')

		return 'MeterReader';

	if ($value == 'L429')

		return 'Millworker';

	if ($value == 'L428')

		return 'Millwright';

	if ($value == 'L427')

		return 'Miner';

	if ($value == 'L426')

		return 'MoldMaker/Molder/InjectionMold';

	if ($value == 'L425')

		return 'OilIndustry/Driller';

	if ($value == 'L424')

		return 'Operator';

	if ($value == 'L423')

		return 'Operator/Boilermaker';

	if ($value == 'L422')

		return 'Operator/CraneOperator';

	if ($value == 'L421')

		return 'Operator/ForkliftOperator';

	if ($value == 'L420')

		return 'Operator/MachineOperator';

	if ($value == 'L419')

		return 'Packer';

	if ($value == 'L418')

		return 'Painter';

	if ($value == 'L417')

		return 'Parts(AutoEtc.)';

	if ($value == 'L416')

		return 'Pipefitter';

	if ($value == 'L415')

		return 'Plumber';

	if ($value == 'L414')

		return 'Polisher';

	if ($value == 'L413')

		return 'Porter';

	if ($value == 'L412')

		return 'PressOperator';

	if ($value == 'L411')

		return 'Presser';

	if ($value == 'L410')

		return 'Printer';

	if ($value == 'L409')

		return 'Production';

	if ($value == 'L408')

		return 'Repairman';

	if ($value == 'L407')

		return 'Roofer';

	if ($value == 'L406')

		return 'Sanitation/Exterminator';

	if ($value == 'L405')

		return 'Seamstress/Tailor/Handicraft';

	if ($value == 'L404')

		return 'Setupman';

	if ($value == 'L403')

		return 'SheetMetalWorker/SteelWorker';

	if ($value == 'L402')

		return 'Shipping/Import/Export/Custom';

	if ($value == 'L401')

		return 'Sorter';

	if ($value == 'L400')

		return 'Toolmaker';

	if ($value == 'L399')

		return 'Transportation';

	if ($value == 'L398')

		return 'Typesetter';

	if ($value == 'L397')

		return 'Upholstery';

	if ($value == 'L396')

		return 'Utility';

	if ($value == 'L395')

		return 'Waiter/Waitress';

	if ($value == 'L394')

		return 'Welder';

	if ($value == 'H349')

		return 'HealthServices';

	if ($value == 'H348')

		return 'Chiropractor';

	if ($value == 'H347')

		return 'DentalAssistant';

	if ($value == 'H346')

		return 'DentalHygienist';

	if ($value == 'H345')

		return 'Dentist';

	if ($value == 'H344')

		return 'Dietician';

	if ($value == 'H343')

		return 'HealthCare';

	if ($value == 'H342')

		return 'MedicalAssistant';

	if ($value == 'H341')

		return 'MedicalSecretary';

	if ($value == 'H340')

		return 'MedicalTechnician';

	if ($value == 'H339')

		return 'Medical/Paramedic';

	if ($value == 'H338')

		return 'NursesAide/Orderly';

	if ($value == 'H337')

		return 'Optician';

	if ($value == 'H336')

		return 'Optometrist';

	if ($value == 'H335')

		return 'Pharmacist/Pharmacy';

	if ($value == 'H334')

		return 'Psychologist';

	if ($value == 'H333')

		return 'Technician/Lab';

	if ($value == 'H332')

		return 'Technician/X-ray';

	if ($value == 'H331')

		return 'Therapist';

	if ($value == 'H330')

		return 'Therapists/Physical';

	if ($value == 'H329')

		return 'Nurse';

	if ($value == 'H328')

		return 'Nurse(Registered)';

	if ($value == 'H327')

		return 'Nurse/LPN';

	if ($value == 'H326')

		return 'SocialWorker/CaseWorker';

	if ($value == 'S299')

		return 'Legal/Paralegal/Assistant';

	if ($value == 'S298')

		return 'LegalSecretary';

	if ($value == 'S297')

		return 'Secretary';

	if ($value == 'S296')

		return 'Typist';

	if ($value == 'S295')

		return 'DataEntry/KeyPunch';

	if ($value == 'P249')

		return 'Homemaker';

	if ($value == 'P248')

		return 'Retired';

	if ($value == 'P247')

		return 'Retired/Pensioner';

	if ($value == 'P246')

		return 'PartTime';

	if ($value == 'P245')

		return 'Student';

	if ($value == 'P244')

		return 'Volunteer';

	if ($value == 'A199')

		return 'ArmedForces';

	if ($value == 'A198')

		return 'ArmyCreditUnionTrades';

	if ($value == 'A197')

		return 'NavyCreditUnionTrades';

	if ($value == 'A196')

		return 'AirForce';

	if ($value == 'A195')

		return 'NationalGuard';

	if ($value == 'A194')

		return 'CoastGuard';

	if ($value == 'A193')

		return 'Marines';

	if ($value == 'I149')

		return 'Coach';

	if ($value == 'I148')

		return 'Counselor';

	if ($value == 'I147')

		return 'Instructor';

	if ($value == 'I146')

		return 'Lecturer';

	if ($value == 'I145')

		return 'Professor';

	if ($value == 'I144')

		return 'Teacher';

	if ($value == 'I143')

		return 'Trainer';

	if ($value == 'C129')

		return 'CivilService';

	if ($value == 'C128')

		return 'AirTrafficControl';

	if ($value == 'C127')

		return 'CivilService/Government';

	if ($value == 'C126')

		return 'Corrections/Probation/Parole';

	if ($value == 'C125')

		return 'CourtReporter';

	if ($value == 'C124')

		return 'Firefighter';

	if ($value == 'C123')

		return 'Judge/Referee';

	if ($value == 'C122')

		return 'MailCarrier/Postal';

	if ($value == 'C121')

		return 'Mail/Postmaster';

	if ($value == 'C120')

		return 'Police/Trooper';

		

	else

		return 'Unknown';

}

function BusinessOwnerExperian($value) {

	if ($value == '1') 

		return 'Accountant';

	if ($value == '2')

		return 'Builder';

	if ($value == '3') 

		return 'Contractor';

	if ($value == '4') 

		return 'Dealer/Retailer/Storekeeper';

	if ($value == '5')

		return 'Distributor/Wholesaler';

	if ($value == '6') 

		return 'Funeral Director';

	if ($value == '7') 

		return 'Maker/Manufacturer';

	if ($value == '8')

		return 'Owner';

	if ($value == '9') 

		return 'Partner';

	if ($value == 'A') 

		return '9 Line of Credit';

		

	else

		return 'Unknown';

}

function NumberChildrenExperian($value) {

	if ($value == '0') 

		return 'No Children';	

	if ($value == '1') 

		return '1 Child';

	if ($value == '2')

		return '2 Children';

	if ($value == '3') 

		return '3 Children';

	if ($value == '4') 

		return '4 Children';

	if ($value == '5')

		return '5 Children';

	if ($value == '6') 

		return '6 Children';

	if ($value == '7') 

		return '7 Children';

	if ($value == '8')

		return 'More than 7 Children';

		

	else

		return 'Unknown';

}

function MaritalStatusExperian($value) {

	if ($value == 'M') 

		return 'Married';	

	if ($value == 'S') 

		return 'Single';

	if ($value == 'A')

		return 'Inferred Married';

	if ($value == 'B') 

		return 'Inferred Single';

		

	else

		return 'Unknown';

}

function OwnerRenterExperian($value) {

	if ($value == 'O') 

		return 'Home Owner';	

	if ($value == 'R') 

		return 'Renter';



	else

		return 'Unknown';

}

function DwellingTypeExperian($value) {

	if ($value == 'M') 

		return 'Multiple Family Dwelling Unit';	

	if ($value == 'S') 

		return 'Single Family Dwelling Unit';

	

	else

		return 'Unknown';

}



function GenerationsInHouseholdExperian($value) {

	if ($value == '1') 

		return '1 Generation - 1 Adult';	

	if ($value == '2') 

		return '2 Generations -  Adult / Child';

	if ($value == '3') 

		return '3 Generations - Adults / Child / Parent';

	

	else

		return 'Unknown';

}

function CreditRatingExperian($value) {

	if ($value == 'A') 

		return '800+';

	if ($value == 'B')

		return '750 - 799';

	if ($value == 'C') 

		return '700 - 749';

	if ($value == 'D') 

		return '650 - 699';

	if ($value == 'E')

		return '600 - 649';

	if ($value == 'F') 

		return '550 - 599';

	if ($value == 'G') 

		return '500-549';

	if ($value == 'H')

		return 'under 499';

		

	else

		return 'Unknown';

}

function PropertyTypeExperian($value) {

	if ($value == 'A') 

		return 'Single Family Dwelling Unit';

	if ($value == 'B')

		return 'Condo';

	if ($value == 'C') 

		return 'Cooperative';

	if ($value == 'D') 

		return '2-4 Unit (Duplex, Triplex, Quad)';

	if ($value == 'E')

		return 'Miscellaneous Residence (Combo Store/Flat)';

	if ($value == 'G') 

		return 'Apartment (5+ Units)';

	if ($value == 'M') 

		return 'Mobile Home';

	if ($value == 'T')

		return 'Timeshare';

		

	else

		return 'Unknown';

}

function EthnicCodeExperian($value) {

	if ($value == '00')

		return 'Unknown';

	if ($value == 'C1')

		return 'Afghani';

	if ($value == 'C2')

		return 'Bengladesh';

	if ($value == 'C3')

		return 'Indian';

	if ($value == 'C4')

		return 'Pakistani';

	if ($value == 'C5')

		return 'Sri Lankan';

	if ($value == 'C6')

		return 'Nepal';

	if ($value == 'C7')

		return 'Telugan';

	if ($value == 'D0')

		return 'Algerian';

	if ($value == 'D1')

		return 'Arab';

	if ($value == 'D2')

		return 'Bahrain';

	if ($value == 'D3')

		return 'Egyptian';

	if ($value == 'D4')

		return 'Greek';

	if ($value == 'D5')

		return 'Iraqi';

	if ($value == 'D6')

		return 'Kurdish';

	if ($value == 'D7')

		return 'Jewish';

	if ($value == 'D8')

		return 'Kuwaiti';

	if ($value == 'D9')

		return 'Libyan';

	if ($value == 'DE')

		return 'Macedonian';

	if ($value == 'DF')

		return 'Moroccan';

	if ($value == 'DG')

		return 'Qatar';

	if ($value == 'DH')

		return 'Persian';

	if ($value == 'DJ')

		return 'Saudi';

	if ($value == 'DK')

		return 'Syrian';

	if ($value == 'DL')

		return 'Tunisian';

	if ($value == 'DM')

		return 'Turkish';

	if ($value == 'DN')

		return 'Yemeni';

	if ($value == 'DS')

		return 'Maltese';

	if ($value == 'KS')

		return 'Native American';

	if ($value == 'M0')

		return 'African American 1';

	if ($value == 'M1')

		return 'Angolan';

	if ($value == 'M2')

		return 'Ashanti';

	if ($value == 'M3')

		return 'Basotho';

	if ($value == 'M4')

		return 'Benin';

	if ($value == 'M5')

		return 'Bhutanese';

	if ($value == 'M6')

		return 'Burkina Faso';

	if ($value == 'M7')

		return 'Burundi';

	if ($value == 'M8')

		return 'Cameroon';

	if ($value == 'M9')

		return 'Cent Afric Rep';

	if ($value == 'MA')

		return 'Chad';

	if ($value == 'MB')

		return 'Comoros';

	if ($value == 'MC')

		return 'Congo';

	if ($value == 'MD')

		return 'Equat Guinea';

	if ($value == 'ME')

		return 'Ethiopian';

	if ($value == 'MF')

		return 'Gabon';

	if ($value == 'MG')

		return 'Gambia';

	if ($value == 'MH')

		return 'Ghana';

	if ($value == 'MJ')

		return 'Guinea-Bissea';

	if ($value == 'MK')

		return 'Guyana';

	if ($value == 'ML')

		return 'Ivory Coast';

	if ($value == 'MM')

		return 'Kenya';

	if ($value == 'MN')

		return 'Lesotho';

	if ($value == 'MO')

		return 'Liberian';

	if ($value == 'MP')

		return 'Madagascar';

	if ($value == 'MQ')

		return 'Malawi';

	if ($value == 'MR')

		return 'Mali';

	if ($value == 'MS')

		return 'Namibian';

	if ($value == 'MT')

		return 'Nigerian';

	if ($value == 'MU')

		return 'Mozambique';

	if ($value == 'MV')

		return 'Papua New Guinea';

	if ($value == 'MW')

		return 'Ruandan';

	if ($value == 'MX')

		return 'Senegalese';

	if ($value == 'MY')

		return 'Siere Leone';

	if ($value == 'MZ')

		return 'Somalia';

	if ($value == 'N1')

		return 'Danish';

	if ($value == 'N2')

		return 'Dutch';

	if ($value == 'N3')

		return 'Finnish';

	if ($value == 'N4')

		return 'Icelandic';

	if ($value == 'N5')

		return 'Norwegian';

	if ($value == 'N6')

		return 'Scotch';

	if ($value == 'N7')

		return 'Swedish';

	if ($value == 'N8')

		return 'Welsh';

	if ($value == '1')

		return 'Aleut';

	if ($value == '2')

		return 'Myanmar';

	if ($value == '3')

		return 'Chinese';

	if ($value == '4')

		return 'Fiji ';

	if ($value == '5')

		return 'Hawaiian';

	if ($value == '6')

		return 'Indonesian';

	if ($value == '7')

		return 'Japanese';

	if ($value == '8')

		return 'Khmer';

	if ($value == '9')

		return 'Korean';

	if ($value == 'RA')

		return 'Laotian';

	if ($value == 'RB')

		return 'Malay';

	if ($value == 'RC')

		return 'Mongolian';

	if ($value == 'RD')

		return 'Other Asian';

	if ($value == 'RE')

		return 'Filipino';

	if ($value == 'RF')

		return 'Thai';

	if ($value == 'RG')

		return 'Tibetan';

	if ($value == 'RH')

		return 'Vietnamese';

	if ($value == 'RJ')

		return 'Maldivian';

	if ($value == 'RK')

		return 'Nauruan';

	if ($value == 'RM')

		return 'New Zealand';

	if ($value == 'RP')

		return 'Australian';

	if ($value == 'RQ')

		return 'Vanuatuan';

	if ($value == 'RS')

		return 'Pili';

	if ($value == 'T1')

		return 'Belgian';

	if ($value == 'T2')

		return 'Basque';

	if ($value == 'T3')

		return 'English';

	if ($value == 'T4')

		return 'French';

	if ($value == 'T5')

		return 'German';

	if ($value == 'T6')

		return 'Irish';

	if ($value == 'T7')

		return 'Italian';

	if ($value == 'T8')

		return 'Portuguese';

	if ($value == 'T9')

		return 'Hispanic ';

	if ($value == 'TE')

		return 'Liechtenstein';

	if ($value == 'TF')

		return 'Luxembourgian';

	if ($value == 'TH')

		return 'Swiss';

	if ($value == 'TJ')

		return 'Manx';

	if ($value == 'U0')

		return 'Albanian';

	if ($value == 'U1')

		return 'Armenian';

	if ($value == 'U2')

		return 'Austrian';

	if ($value == 'U3')

		return 'Azerb';

	if ($value == 'U4')

		return 'Bosnian';

	if ($value == 'U5')

		return 'Bulgarian';

	if ($value == 'U6')

		return 'Byelorussian';

	if ($value == 'U7')

		return 'Chechnian';

	if ($value == 'U8')

		return 'Croatian';

	if ($value == 'U9')

		return 'Czech';

	if ($value == 'UA')

		return 'Estonian';

	if ($value == 'UB')

		return 'Georgian';

	if ($value == 'UC')

		return 'Hungarian';

	if ($value == 'UD')

		return 'Kazakh';

	if ($value == 'UE')

		return 'Kirghiz';

	if ($value == 'UF')

		return 'Kyrgyzstani';

	if ($value == 'UG')

		return 'Latvian';

	if ($value == 'UH')

		return 'Lithuanian';

	if ($value == 'UI')

		return 'Moldavian';

	if ($value == 'UJ')

		return 'Polish';

	if ($value == 'UK')

		return 'Romanian';

	if ($value == 'UL')

		return 'Russian';

	if ($value == 'UM')

		return 'Serbian';

	if ($value == 'UN')

		return 'Slovakian';

	if ($value == 'UP')

		return 'Slovenian';

	if ($value == 'UQ')

		return 'Tajikistan';

	if ($value == 'UR')

		return 'Tajik';

	if ($value == 'UT')

		return 'Turkmenistan';

	if ($value == 'UV')

		return 'Ukrainian';

	if ($value == 'UW')

		return 'Uzbekistani';

	if ($value == 'W0')

		return 'South African';

	if ($value == 'W1')

		return 'Surinam';

	if ($value == 'W2')

		return 'Sudanese';

	if ($value == 'W3')

		return 'Swaziland';

	if ($value == 'W4')

		return 'Tanzanian';

	if ($value == 'W5')

		return 'Togo';

	if ($value == 'W6')

		return 'Tonga';

	if ($value == 'W7')

		return 'Ugandan';

	if ($value == 'W8')

		return 'Xhosa';

	if ($value == 'W9')

		return 'Zaire';

	if ($value == 'WA')

		return 'Zambian';

	if ($value == 'WB')

		return 'Zimbabwe';

	if ($value == 'WC')

		return 'Zulu';

	if ($value == 'WE')

		return 'Djibouti';

	if ($value == 'WF')

		return 'Guinean';

	if ($value == 'WG')

		return 'Mauritania';

	if ($value == 'WH')

		return 'Niger';

	if ($value == 'WJ')

		return 'Seychelles';

	if ($value == 'WK')

		return 'Western Samoa';

	if ($value == 'WL')

		return 'African American 2';

	if ($value == 'WM')

		return 'Botswanian';

	if ($value == 'WN')

		return 'Hausa';

	if ($value == 'WP')

		return 'Caribbean African American';

	if ($value == 'WS')

		return 'Swahili';

	if ($value == 'XX')

		return 'Multi-Ethnic';

		

	else

		return 'Unknown';

}

function EthnicGroupExperian($value) {

	if ($value == 'Z')

		return 'Unknown';

	if ($value == 'A')

		return 'Afghani';

	if ($value == 'A')

		return 'Bengladesh';

	if ($value == 'A')

		return 'Indian';

	if ($value == 'A')

		return 'Pakistani';

	if ($value == 'A')

		return 'Sri Lankan';

	if ($value == 'A')

		return 'Nepal';

	if ($value == 'A')

		return 'Telugan';

	if ($value == 'I')

		return 'Algerian';

	if ($value == 'I')

		return 'Arab';

	if ($value == 'I')

		return 'Bahrain';

	if ($value == 'I')

		return 'Egyptian';

	if ($value == 'M')

		return 'Greek';

	if ($value == 'I')

		return 'Iraqi';

	if ($value == 'W')

		return 'Kurdish';

	if ($value == 'J')

		return 'Jewish';

	if ($value == 'I')

		return 'Kuwaiti';

	if ($value == 'I')

		return 'Libyan';

	if ($value == 'E')

		return 'Macedonian';

	if ($value == 'I')

		return 'Moroccan';

	if ($value == 'I')

		return 'Qatar';

	if ($value == 'I')

		return 'Persian';

	if ($value == 'I')

		return 'Saudi';

	if ($value == 'I')

		return 'Syrian';

	if ($value == 'I')

		return 'Tunisian';

	if ($value == 'W')

		return 'Turkish';

	if ($value == 'I')

		return 'Yemeni';

	if ($value == 'M')

		return 'Maltese';

	if ($value == 'N')

		return 'Native American';

	if ($value == 'F')

		return 'African American 1';

	if ($value == 'F')

		return 'Angolan';

	if ($value == 'F')

		return 'Ashanti';

	if ($value == 'F')

		return 'Basotho';

	if ($value == 'F')

		return 'Benin';

	if ($value == 'A')

		return 'Bhutanese';

	if ($value == 'F')

		return 'Burkina Faso';

	if ($value == 'F')

		return 'Burundi';

	if ($value == 'F')

		return 'Cameroon';

	if ($value == 'F')

		return 'Cent Afric Rep';

	if ($value == 'F')

		return 'Chad';

	if ($value == 'F')

		return 'Comoros';

	if ($value == 'F')

		return 'Congo';

	if ($value == 'F')

		return 'Equat Guinea';

	if ($value == 'F')

		return 'Ethiopian';

	if ($value == 'F')

		return 'Gabon';

	if ($value == 'F')

		return 'Gambia';

	if ($value == 'F')

		return 'Ghana';

	if ($value == 'F')

		return 'Guinea-Bissea';

	if ($value == 'T')

		return 'Guyana';

	if ($value == 'F')

		return 'Ivory Coast';

	if ($value == 'F')

		return 'Kenya';

	if ($value == 'F')

		return 'Lesotho';

	if ($value == 'F')

		return 'Liberian';

	if ($value == 'F')

		return 'Madagascar';

	if ($value == 'F')

		return 'Malawi';

	if ($value == 'F')

		return 'Mali';

	if ($value == 'F')

		return 'Namibian';

	if ($value == 'F')

		return 'Nigerian';

	if ($value == 'F')

		return 'Mozambique';

	if ($value == 'P')

		return 'Papua New Guinea';

	if ($value == 'F')

		return 'Ruandan';

	if ($value == 'F')

		return 'Senegalese';

	if ($value == 'F')

		return 'Siere Leone';

	if ($value == 'F')

		return 'Somalia';

	if ($value == 'S')

		return 'Danish';

	if ($value == 'W')

		return 'Dutch';

	if ($value == 'S')

		return 'Finnish';

	if ($value == 'S')

		return 'Icelandic';

	if ($value == 'S')

		return 'Norwegian';

	if ($value == 'W')

		return 'Scotch';

	if ($value == 'S')

		return 'Swedish';

	if ($value == 'W')

		return 'Welsh';

	if ($value == 'N')

		return 'Aleut';

	if ($value == 'O')

		return 'Myanmar';

	if ($value == 'O')

		return 'Chinese';

	if ($value == 'P')

		return 'Fiji ';

	if ($value == 'P')

		return 'Hawaiian';

	if ($value == 'O')

		return 'Indonesian';

	if ($value == 'O')

		return 'Japanese';

	if ($value == 'O')

		return 'Khmer';

	if ($value == 'O')

		return 'Korean';

	if ($value == 'O')

		return 'Laotian';

	if ($value == 'O')

		return 'Malay';

	if ($value == 'O')

		return 'Mongolian';

	if ($value == 'A')

		return 'Other Asian';

	if ($value == 'P')

		return 'Filipino';

	if ($value == 'O')

		return 'Thai';

	if ($value == 'O')

		return 'Tibetan';

	if ($value == 'O')

		return 'Vietnamese';

	if ($value == 'T')

		return 'Maldivian';

	if ($value == 'P')

		return 'Nauruan';

	if ($value == 'T')

		return 'New Zealand';

	if ($value == 'T')

		return 'Australian';

	if ($value == 'P')

		return 'Vanuatuan';

	if ($value == 'P')

		return 'Pili';

	if ($value == 'W')

		return 'Belgian';

	if ($value == 'Y')

		return 'Basque';

	if ($value == 'W')

		return 'English';

	if ($value == 'W')

		return 'French';

	if ($value == 'W')

		return 'German';

	if ($value == 'W')

		return 'Irish';

	if ($value == 'M')

		return 'Italian';

	if ($value == 'Y')

		return 'Portuguese';

	if ($value == 'Y')

		return 'Hispanic ';

	if ($value == 'W')

		return 'Liechtenstein';

	if ($value == 'W')

		return 'Luxembourgian';

	if ($value == 'W')

		return 'Swiss';

	if ($value == 'W')

		return 'Manx';

	if ($value == 'E')

		return 'Albanian';

	if ($value == 'C')

		return 'Armenian';

	if ($value == 'W')

		return 'Austrian';

	if ($value == 'C')

		return 'Azerb';

	if ($value == 'E')

		return 'Bosnian';

	if ($value == 'E')

		return 'Bulgarian';

	if ($value == 'E')

		return 'Byelorussian';

	if ($value == 'C')

		return 'Chechnian';

	if ($value == 'E')

		return 'Croatian';

	if ($value == 'E')

		return 'Czech';

	if ($value == 'E')

		return 'Estonian';

	if ($value == 'C')

		return 'Georgian';

	if ($value == 'E')

		return 'Hungarian';

	if ($value == 'C')

		return 'Kazakh';

	if ($value == 'C')

		return 'Kirghiz';

	if ($value == 'C')

		return 'Kyrgyzstani';

	if ($value == 'E')

		return 'Latvian';

	if ($value == 'E')

		return 'Lithuanian';

	if ($value == 'E')

		return 'Moldavian';

	if ($value == 'E')

		return 'Polish';

	if ($value == 'E')

		return 'Romanian';

	if ($value == 'E')

		return 'Russian';

	if ($value == 'E')

		return 'Serbian';

	if ($value == 'E')

		return 'Slovakian';

	if ($value == 'E')

		return 'Slovenian';

	if ($value == 'C')

		return 'Tajikistan';

	if ($value == 'C')

		return 'Tajik';

	if ($value == 'C')

		return 'Turkmenistan';

	if ($value == 'E')

		return 'Ukrainian';

	if ($value == 'C')

		return 'Uzbekistani';

	if ($value == 'F')

		return 'South African';

	if ($value == 'T')

		return 'Surinam';

	if ($value == 'F')

		return 'Sudanese';

	if ($value == 'F')

		return 'Swaziland';

	if ($value == 'F')

		return 'Tanzanian';

	if ($value == 'F')

		return 'Togo';

	if ($value == 'P')

		return 'Tonga';

	if ($value == 'F')

		return 'Ugandan';

	if ($value == 'F')

		return 'Xhosa';

	if ($value == 'F')

		return 'Zaire';

	if ($value == 'F')

		return 'Zambian';

	if ($value == 'F')

		return 'Zimbabwe';

	if ($value == 'F')

		return 'Zulu';

	if ($value == 'F')

		return 'Djibouti';

	if ($value == 'F')

		return 'Guinean';

	if ($value == 'F')

		return 'Mauritania';

	if ($value == 'F')

		return 'Niger';

	if ($value == 'F')

		return 'Seychelles';

	if ($value == 'P')

		return 'Western Samoa';

	if ($value == 'F')

		return 'African American 2';

	if ($value == 'F')

		return 'Botswanian';

	if ($value == 'F')

		return 'Hausa';

	if ($value == 'F')

		return 'Caribbean African American';

	if ($value == 'F')

		return 'Swahili';

	if ($value == 'Z')

		return 'Multi-Ethnic';

	

	else

		return 'Unknown';

}

function EthnicConfExperian($value) {

	if ($value == 'F')

		return 'All African American Ethnic Groups';

	if ($value == 'O')

		return 'Far Eastern';

	if ($value == 'A')

		return 'Southeast Asian';

	if ($value == 'C')

		return 'Central & Southwest Asian';

	if ($value == 'M')

		return 'Mediterranean';

	if ($value == 'N')

		return 'Native American';

	if ($value == 'S')

		return 'Scandinavian';

	if ($value == 'P')

		return 'Polynesian';

	if ($value == 'I')

		return 'Middle Eastern';

	if ($value == 'J')

		return 'Jewish';

	if ($value == 'W')

		return 'Western European';

	if ($value == 'E')

		return 'Eastern European';

	if ($value == 'U')

		return 'Miscellaneous Other';

	if ($value == 'Z')

		return 'Uncoded (No Group)';

	if ($value == 'Y')

		return 'Hispanic';

	if ($value == 'T')

		return 'Other ';

		

	else

		return 'Unknown';

}

function EthnicAssimilationExperian($value) {

	if ($value == 'A')

		return 'Assimilated - English Speaking';

	if ($value == 'B')

		return 'Bilingual - English Primary';

	if ($value == 'C')

		return 'Bilingual - Native Language Primary';

	if ($value == 'D')

		return 'Unassimilated - Native Language Only';



	else

		return 'Unknown';

}

function ReligionExperian($value) {

	if ($value == 'B')

		return 'Buddhist';

	if ($value == 'C')

		return 'Catholic';

	if ($value == 'G')

		return 'Greek Orthodox';

	if ($value == 'H')

		return 'Hindu';

	if ($value == 'I')

		return 'Islamic';

	if ($value == 'J')

		return 'Jewish';

	if ($value == 'K')


		return 'Siku';

	if ($value == 'L')

		return 'Lutheran';

	if ($value == 'M')

		return 'Mormon';

	if ($value == 'O')

		return 'Eastern Orthodox';

	if ($value == 'P')

		return 'Protestant';

	if ($value == 'S')

		return 'Shinto';

	if ($value == 'X')

		return 'Not Known  or  Unmatched';

		

	else

		return 'Unknown';

}

function HispanicCountryExperian($value) {

	if ($value == 'HA')

		return 'Argentina';

	if ($value == 'HB')

		return 'Bolivia';

	if ($value == 'HZ')

		return 'Brazil';

	if ($value == 'HQ')

		return 'Chile';

	if ($value == 'HJ')

		return 'Colombia';

	if ($value == 'HR')

		return 'Costa Rica';

	if ($value == 'HC')

		return 'Cuba';

	if ($value == 'HD')

		return 'Dominican Republic';

	if ($value == 'HL')

		return 'Ecuador';

	if ($value == 'HE')

		return 'El Salvador';

	if ($value == 'HG')

		return 'Guatemala';

	if ($value == 'HH')

		return 'Honduras';

	if ($value == 'HM')

		return 'Mexico';

	if ($value == 'HN')

		return 'Nicaragua';

	if ($value == 'HK')

		return 'Panama';

	if ($value == 'HY')

		return 'Paraguay';

	if ($value == 'HX')

		return 'Peru';

	if ($value == 'HP')

		return 'Puerto Rico';

	if ($value == 'HS')

		return 'Spain';

	if ($value == 'HU')

		return 'Uruguay';

	if ($value == 'HV')

		return 'Venezuela';

	if ($value == '00')

		return 'Unknown';

	

	else

		return 'Unknown';

}

function LanguageCodeExperian($value) {

	if ($value == 'A1')

		return 'Afrikaans';

	if ($value == 'A2')

		return 'Albanian';

	if ($value == 'A3')

		return 'Amharic';

	if ($value == 'A4')

		return 'Arabic';

	if ($value == 'A5')

		return 'Armenian';

	if ($value == 'A6')

		return 'Ashanti';

	if ($value == 'A7')

		return 'Azeri';

	if ($value == 'B1')

		return 'Bantu';

	if ($value == 'B2')

		return 'Basque';

	if ($value == 'B3')

		return 'Bengali';

	if ($value == 'B4')

		return 'Bulgarian';

	if ($value == 'B5')

		return 'Burmese';

	if ($value == 'C1')

		return 'Chinese (Mandarin, Cantonese and other dialects)';

	if ($value == 'C2')

		return 'Comorian';

	if ($value == 'C3')

		return 'Czech';

	if ($value == 'D1')

		return 'Danish';

	if ($value == 'D2')

		return 'Dutch';

	if ($value == 'D3')

		return 'Dzongha';

	if ($value == 'E1')

		return 'English';

	if ($value == 'E2')

		return 'Estonian';

	if ($value == 'F1')

		return 'Farsi';

	if ($value == 'F2')

		return 'Finnish';

	if ($value == 'F3')

		return 'French';

	if ($value == 'G1')

		return 'Georgian';

	if ($value == 'G2')

		return 'German';

	if ($value == 'G3')

		return 'Ga';

	if ($value == 'G4')

		return 'Greek';

	if ($value == 'H1')

		return 'Hausa';

	if ($value == 'H2')

		return 'Hebrew';

	if ($value == 'H3')

		return 'Hindi';

	if ($value == 'H4')

		return 'Hungarian';

	if ($value == 'I1')

		return 'Icelandic';

	if ($value == 'I2')

		return 'Indonesian';

	if ($value == 'I3')

		return 'Italian';

	if ($value == 'J1')

		return 'Japanese';

	if ($value == 'K1')

		return 'Kazakh';

	if ($value == 'K2')

		return 'Khmer';

	if ($value == 'K3')

		return 'Kirghiz';

	if ($value == 'K4')

		return 'Korean';

	if ($value == 'L1')

		return 'Laotian (Include Hmong)';

	if ($value == 'L2')

		return 'Latvian';

	if ($value == 'L3')

		return 'Lithuanian';

	if ($value == 'M1')

		return 'Macedonian';

	if ($value == 'M2')

		return 'Malagasy';

	if ($value == 'M3')

		return 'Malay';

	if ($value == 'M4')

		return 'Moldavian';

	if ($value == 'M5')

		return 'Mongolian';

	if ($value == 'N1')

		return 'Nepali';

	if ($value == 'N2')

		return 'Norwegian';

	if ($value == 'O1')

		return 'Oromo';

	if ($value == 'P1')

		return 'Pashto';

	if ($value == 'P2')

		return 'Polish';

	if ($value == 'P3')

		return 'Portuguese';

	if ($value == 'R1')

		return 'Romanian';

	if ($value == 'R2')

		return 'Russian';

	if ($value == 'S1')

		return 'Samoan';

	if ($value == 'S2')

		return 'Serbo-Croatian';

	if ($value == 'S3')

		return 'Sinhalese';

	if ($value == 'S4')

		return 'Slovakian';

	if ($value == 'S5')

		return 'Slovenian';

	if ($value == 'S6')

		return 'Somali';

	if ($value == 'S7')

		return 'Sotho';

	if ($value == 'S8')

		return 'Spanish';

	if ($value == 'S9')

		return 'Swahili';

	if ($value == 'SA')

		return 'Swazi';

	if ($value == 'SB')

		return 'Swedish';

	if ($value == 'T1')

		return 'Tagalog';

	if ($value == 'T2')

		return 'Tajik';

	if ($value == 'T3')

		return 'Thai';

	if ($value == 'T4')

		return 'Tibetan';

	if ($value == 'T5')

		return 'Tongan';

	if ($value == 'T6')

		return 'Turkish';

	if ($value == 'T7')

		return 'Turkmeni';

	if ($value == 'T8')

		return 'Tswana';

	if ($value == 'UX')

		return 'Unknown';

	if ($value == 'U1')

		return 'Urdu';

	if ($value == 'U2')

		return 'Uzbeki';

	if ($value == 'V1')

		return 'Vietnamese';

	if ($value == 'X1')

		return 'Xhosa';

	if ($value == 'Z1')

		return 'Zulu';

	

	else

		return 'Unknown';

}

?>