
create table instructor(
i_account char(20) not null,
name char(40) not null,
password char(40) not null,
primary key(i_account));

create table student(
s_account char(20) not null,
name char(40) not null,
password char(40) not null,
primary key(s_account));

create table course(
id char(6) not null,
title char(40) not null,
credits numeric(2,1) not null,
information varchar(200) not null,
primary key(id));

create table teaches(
i_account char(20),
id char(6),
foreign key (i_account) references instructor(i_account), 
foreign key (id) references course(id));

create table register(
survey_status boolean not null,
survey_ts timestamp not null,
s_account char(20),
id char(6),
foreign key (s_account) references student(s_account), 
foreign key (id) references course(id));

create table questions (
question_number int not null,
question_text text(2000) not null,
bool_response_type bool not null,
primary key (question_number)
);

create table surveys(
survey_response text(2000) not null,
question_number int,
s_account char(20),
ID char(6),
foreign key (question_number) references questions(question_number),
foreign key (s_account) references student(s_account),
foreign key (ID) references course(ID)
);

delimiter //
create procedure make_inst_acc (in account char(20), in instname char(40))
begin
	insert into instructor values(account, instname, "");
end//

create procedure make_student_acc (in account char(20), in studentname char(40))
begin
	insert into student values(account, studentname, "");
end//

create procedure makeCourse (in id char(6), in title char(40), in credits 
numeric(2,1), in information varchar(200))
begin
			insert into course values(id, title, credits, information);
end//

create procedure assignToCourse (in instructID char(20), in courseID char(6))
begin
	insert into teaches values(instructID, courseID);
end//

create procedure evalQ (in questionNum int, in question_text text(2000) , in bool_response bool)
begin
			insert into questions values(questionNum, question_text, bool_response);
end//

delimiter ;

call make_inst_acc('jon', 'Jon');
call make_inst_acc('judy', 'Judy');

call make_student_acc('mary', 'Mary');

call makeCourse('CS1000', 'Explorations in Computing', 1.0, 'An introduction to the study of computing: fundamental concepts and skills; opportunities at Michigan Tech; career opportunities; social and ethical issues.');
call makeCourse('CS1121', 'Intro To Prog I', 3.0, 'An introduction to the study of computing: fundamental concepts and skills; opportunities at Michigan Tech; career opportunities; social and ethical issues.');
call makeCourse('CS1122', 'Intro To Prog II', 3.0, 'An introduction to the study of computing: fundamental concepts and skills; opportunities at Michigan Tech; career opportunities; social and ethical issues.');

call assignToCourse('jon', 'CS1000');
call assignToCourse('jon', 'CS1121');
call assignToCourse('judy', 'CS1122');

call evalQ(1, "I understood the goals and objectives of this course.", true);

call evalQ(2, "If you were meeting with another student about to start this class, what advice would you give him/her?", false);

select * from surveys;

select i_account, id from teaches natural join instructor where i_account = i_account;

delete from teaches where i_account = "jon";
