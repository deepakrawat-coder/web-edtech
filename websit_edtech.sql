-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2025 at 07:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websit_edtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `order_index` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `image_url`, `order_index`, `status`, `created_at`, `updated_at`) VALUES
(5, 'sdfdsf', '<p>EdTech Innovate has developed a great tech platform for multi-student administration systems, customer relations management, enterprise resource planning, learning management systems, and useful examination administration-an advancement that, in turn, improves student experience and productivity, marketing effectiveness, and enrolment growth.</p>\r\n\r\n<p>EdTech Innovate, a product-oriented company providing services under Software as a Service (SaaS), is very prominent in creating a digital platform using which universities and aspiring students can connect and run their operations right from marketing and admission to providing students with an enhanced educational experience at all stages through innovative technological solutions.</p>\r\n', '/admin-assets/img/aboutUs/1717226482.jpg', 1, 1, '2024-06-01 07:21:21', '2025-04-05 07:25:14'),
(7, 'sadsad', '<p>We give web portals, ERP (enterprise resource planning), CRM (client relationship management), admission management systems, online examinations, and a comprehensive LMS with eBooks and video lectures to partnered schools and students. Such services help an institution not merely increase enrolments but also save on marketing costs and improve productivity.</p>\r\n\r\n<p>Our services include web portal development, enterprise resource planning, client relationship management, admission management system, online examination, and complete learning management system with eBooks, video lectures, and more for partnered universities and students. These services empower institutions to not only expand enrolments but also optimize marketing expenditures and boost productivity.</p>\r\n', '/admin-assets/img/aboutUs/1717227813.jpg', 3, 1, '2024-06-01 07:43:33', '2025-04-05 07:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `blogfaq`
--

CREATE TABLE `blogfaq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogfaq_service`
--

CREATE TABLE `blogfaq_service` (
  `id` int(11) NOT NULL,
  `blogs_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` longtext NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogfaq_service`
--

INSERT INTO `blogfaq_service` (`id`, `blogs_id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 'deepak', '<p>deepak</p>\r\n', 1, '2025-09-12 07:23:39', '2025-09-12 07:25:16'),
(3, 7, 'deepak wqeweqw', '<p>eqwewqeqw</p>\r\n', 1, '2025-09-12 07:26:02', '2025-09-12 07:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `ID` int(255) NOT NULL,
  `Name` text DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Content` text DEFAULT NULL,
  `Meta_Title` varchar(255) DEFAULT NULL,
  `Meta_Key` varchar(255) DEFAULT NULL,
  `Meta_Description` text DEFAULT NULL,
  `Status` int(2) DEFAULT 1,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`ID`, `Name`, `Slug`, `Photo`, `Description`, `Content`, `Meta_Title`, `Meta_Key`, `Meta_Description`, `Status`, `Created_At`, `Updated_At`) VALUES
(33, 'Difference between ERP and AMS', 'difference-between-erp-and-ams', '/admin-assets/img/blogs/1718435612.jpg', 'In this blog, we will understand Enterprise Resource Planning (ERP) and Admission Management System (AMS) software and highlight the key differences between these two software tools.', '<p>In this blog, we will understand Enterprise Resource Planning (ERP) and Admission Management System (AMS) software and highlight the key differences between these two software tools.</p>\r\n\r\n<h2>Admission Management System (AMS)</h2>\r\n\r\n<p>An automated&nbsp;<strong>admission management system</strong>&nbsp;is a software program that helps to enhance an institution&#39;s online admissions process to be more effective. The admission management system software&#39;s features involve providing students access to a secure online application portal, monitoring and responding to candidate inquiries, and organizing and managing the application and document submission process. AMS software integrates various social media platforms to enhance communication among users and improve the connection between users and institutions. AMS also helps institutions collect payments by offering a payment management system that collects students&#39; fees and generates payment statements. Through <a href=\"https://www.edtechinnovate.com/admission-management-system\"><strong>admission management system</strong></a>, institutions can track admission status, and respond to all students&#39; queries to ensure they experience a seamless admissions process.</p>\r\n\r\n<h2>Enterprise Resource Planning (ERP)</h2>\r\n\r\n<p>Enterprise Resource Planning, or ERP, is the process of organizing, monitoring, communicating, and simplifying the academic structure of an institution. An automated Enterprise Resource Planning software tool helps educational institutions by integrating and digitizing their various administrative functions by providing a digital platform for educational institutions. It is a single, centralized platform that includes managing staff and students, scheduling exams, fee accounting, and other related activities and operations to save time, and cost, and ensure efficient resource utilization. With an online ERP portal, the communication between users is enhanced which improves the connection between students and educators for a better educational experience. Overall, ERP software enables institutions to operate more cost-effectively and strategically which helps in boosting the productivity and growth of the institution.</p>\r\n\r\n<h2>Difference between AMS and ERP</h2>\r\n\r\n<ul>\r\n	<li>AMS software is related to the management of the entire admission process of an institution including applications, document submission, communication, and application tracking.<br />\r\n	ERP software is used to perform various academic and administrative operations. The scope of ERP goes beyond the admission process. It includes student and staff management, finance management, attendance tracking, and academic activities management.</li>\r\n	<li>AMS software is developed to streamline the admission process for an institution. This includes managing applications, decision-making, and increasing enrollments.<br />\r\n	ERP software manages all activities and operations associated with an educational institution, including admissions, academic programs, communication, and financial and human resource management.</li>\r\n	<li>AMS software primarily deals with the admission process, but it can also be integrated with other systems.<br />\r\n	ERP software is integrated with multiple systems within an educational institution for a single, unified platform.</li>\r\n	<li>AMS software is suitable for smaller-scale operations that are focused on admissions. It may lack the scalability needed to manage all aspects of a large educational institution.<br />\r\n	ERP software is designed to scale with the size and complexity of educational institutions. It offers flexibility and customization options to meet the diverse needs of different types of institutions.</li>\r\n	<li>AMS software is primarily used by the institution&rsquo;s admissions-related departments and prospective students and applicants.<br />\r\n	ERP software is used by multiple departments of the organization including administration, financial department, Human resources department, among more.</li>\r\n	<li>ERP software allows greater flexibility in the customization of the software to adapt to the diverse needs and requirements of different departments and functions within an organization, compared to AMS software.</li>\r\n</ul>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/top-reasons-to-use-online-examination-system-for-institutes-and-universities\">Top 10 Reasons to Use Online Examination Systems for Institutes &amp; Universities</a></strong></p>\r\n\r\n<h2>Which to Choose</h2>\r\n\r\n<p>Choosing between&nbsp;<strong>AMS and ERP software</strong>&nbsp;is dependent on various factors such as the needs and requirements of your organization, scope of work, scalability, and customization, among others. Some factors need to be considered when choosing the right software for your institution. These factors are listed below.</p>\r\n\r\n<ul>\r\n	<li><strong>Scope -</strong>&nbsp;If your primary work is related to managing admission-related tasks of prospective students, then you should go for AMS software. But if your work scope goes admissions and also involves functions of finance, HR, and other departments, you can choose ERP software.</li>\r\n	<li><strong>Budget -</strong>&nbsp;AMS software typically costs less than ERP software but compromises on some functionalities as it mainly handles admission-related tasks. It is advised that you evaluate your budget and requirements before choosing a software.</li>\r\n	<li><strong>Integration Capabilities -</strong>&nbsp;ERP software can be integrated with multiple systems to streamline the functioning of an organization. AMS software possesses fewer integration capabilities when compared to ERP software.</li>\r\n	<li><strong>Customization -</strong>&nbsp;ERP software is developed to offer a higher degree of customization for organizations when compared to AMS software. AMS software also allows customization options to align with the unique requirements of institutions but offers limited customization capabilities.</li>\r\n	<li><strong>Scalability -</strong>&nbsp;AMS software is more suitable for small-scale organizations and requires upgradation with the growth of the organization. ERP software is designed to accommodate scaling with the organization&rsquo;s growth.</li>\r\n</ul>\r\n\r\n<h3>Conclusion</h3>\r\n\r\n<p>The choice between&nbsp;<strong>Admission Management System (AMS)</strong>&nbsp;and Enterprise Resource Planning (ERP) software hinges on several factors such as scope, budget, integration capabilities, customization, and scalability. AMS is developed to handle the admission processes for institutions and is ideal for smaller-scale institutions. Whereas ERP offers a comprehensive solution for organizations by integrating various departments and functions within an organization.</p>\r\n', 'Difference between ERP and AMS | Edtech Innovate', 'Difference between ERP and AMS', 'Confused by ERP vs AMS? This guide breaks down the key differences between Enterprise Resource Planning (ERP) and Admission Management Systems.', 1, '2024-05-30 11:57:52', '2025-09-08 09:36:36'),
(35, 'Top 10 Reasons to Use Online Examination Systems for Institutes & Universities', 'top-reasons-to-use-online-examination-system-for-institutes-and-universities', '/admin-assets/img/blogs/1717831228.jpg', 'There has been a rapid shift in the way education is being delivered in modern times. Now, more and more students are enrolling in online courses due to the flexibility and accessibility offered in these courses. Students can pursue these online courses from their preferred locations without facing any geographical limitations with the help of their mobile or laptop devices via the Internet. As these courses are accessible from anywhere, it is a major challenge for educational institutions to conduct examinations securely and transparently to maintain the credibility of these exams and offer deserving students a fair environment to prove their hard work. For this purpose, institutions have started employing a secure and reliable online examination system that ensures that the exam is conducted in a fair and transparent environment. In this blog, we will understand what an online examination system is and what are the major reasons why institutions and universities are using it to conduct exams for their students.', '<p>There has been a rapid shift in the way education is being delivered in modern times. Now, more and more students are enrolling in online courses due to the flexibility and accessibility offered in these courses. Students can pursue these online courses from their preferred locations without facing any geographical limitations with the help of their mobile or laptop devices via the Internet. As these courses are accessible from anywhere, it is a major challenge for educational institutions to conduct examinations securely and transparently to maintain the credibility of these exams and offer deserving students a fair environment to prove their hard work. For this purpose, institutions have started employing a secure and reliable online examination system that ensures that the exam is conducted in a fair and transparent environment. In this blog, we will understand what an&nbsp;<strong>online examination system</strong>&nbsp;is and what are the major reasons why institutions and universities are using it to conduct exams for their students.</p>\r\n\r\n<h2>About the Online Examination System</h2>\r\n\r\n<p>The&nbsp;<strong>Online Examination System is a software</strong>&nbsp;tool used by institutions and universities to upload questions, conduct exams, invigilate students, and assessment purposes digitally. Not only students are offered flexibility to appear for their examinations from the comfort of their preferred locations without the necessity of traveling to classrooms or test centers, but the online examination portal provides an equally secured and reliable platform for students to appear for examinations. Through this software tool, Educational Institutions have the accessibility to effectively administer the entire examination process, from scheduling and uploading questions to proctoring and result publication. The embedded live proctoring system and robust cheating-prevention mechanisms ensure the integrity and fairness of assessments.</p>\r\n\r\n<p>Also, the&nbsp;<a href=\"https://www.edtechinnovate.com/online-exam-portal\"><strong>Online Examination Portal</strong></a>&nbsp;can be integrated with the installed Learning Management System of the institution that enables various features such as the publication of exam results directly to the student&rsquo;s user dashboards. This integration not only streamlines the administrative workflows but also enhances the overall learning experience for students. Other features of the&nbsp;<strong>Online Examination System</strong>&nbsp;include diverse assessment formats such as subjective essays, MCQs, reasoning tests, simulations, practical assessments, etc., and the availability of a multi-lingual interface to help provide students with a user-friendly interface. This adaptive model helps in the fulfillment of students&#39; unique needs and requirements of each discipline and course. Also, the online examination portal is designed with the utmost flexibility to ensure accessibility across numerous web browsers, Android, and iOS platforms.</p>\r\n\r\n<h2>Top 10 Benefits of Online Exams</h2>\r\n\r\n<ul>\r\n	<li><strong>Security -</strong>&nbsp;The online examination system comes with a robust online proctoring and cheating prevention mechanism that helps conduct and administer exams with fairness and transparency.</li>\r\n	<li><strong>Environmentally friendly -</strong>&nbsp;As the exams are conducted in digital format, this helps in eliminating the use of papers and inks. These&nbsp;<strong>benefits of online exams</strong>&nbsp;directly help in environment conservation.</li>\r\n	<li><strong>Cost saving -</strong>&nbsp;Educational Institutions need not invest in the physical infrastructure such as classrooms, test faculties, and invigilators to conduct online exams. This helps in minimizing costs for the institution.</li>\r\n	<li><strong>Remote proctoring -</strong>&nbsp;By employing an&nbsp;<strong>online examination system</strong>&nbsp;within the institution, there is no need to invigilate all the students manually as the online proctoring system installed in the online examination portal helps in the online proctoring and E-assessment solutions of students through the examination process.</li>\r\n	<li><strong>Easy exam configuration -</strong>&nbsp;The online examination system is designed in such a way that it can be used by institutions easily for exam configuration and assessment.</li>\r\n	<li><strong>Scalability -</strong>&nbsp;The Benefits of online exams are that they easily cater to a large number of students appearing for the exams with equally capable proctoring and assessment capabilities.</li>\r\n	<li><strong>Streamlined administration -</strong>&nbsp;The online examination system helps in streamlining the administration process for institutions by automating the entire examination process.</li>\r\n	<li><strong>Accuracy and precision -</strong>&nbsp;The online examination portal provides a fair and transparent environment for exam conduction. This ensures greater accuracy and precision when compared to offline conduct of examinations.</li>\r\n	<li><strong>Easy usage -</strong>&nbsp;The online examination portal&#39;s user-friendly interface helps institutions easily utilize the software for exam preparation, conduction, proctoring, E-assessment solutions, and result declaration.</li>\r\n	<li><strong>Immediately possible to generate results -</strong>&nbsp;For most of the exams, results can be published earlier, almost immediately, than in case of offline examination if the institution uses an online examination portal.</li>\r\n</ul>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/grow-university-through-ams-software\">Growth Of Universities Through AMS Software</a></strong></p>\r\n\r\n<h3>Conclusion</h3>\r\n\r\n<p>In conclusion, the&nbsp;<strong>online examination system</strong>&nbsp;significantly improves the functioning of an institution or university by streamlining the entire examination process. Through this, students get the opportunity to appear for their exams from the comfort of their homes, and universities need not invest in physical infrastructure such as classrooms or test centers to conduct examinations.</p>\r\n', 'Top 10 Reasons to Use Online Examination Systems for Institutes & Universities', 'online examination system', 'Online examination system helps to reduce faculty workload, ensures high security of data, ensures AI-based proctoring, and eliminates the need for invigilators during the exam.', 1, '2024-06-08 07:20:27', '2024-11-24 18:37:51'),
(38, 'Growth Of Universities Through Admission Management System Software', 'grow-university-through-admissions-management-software', '/admin-assets/img/blogs/1718277710.jpg', 'In this blog, we will learn about what Admission Management System software is and how it can help in the growth and productivity of educational institutions.', '<p>In this blog, we will learn about what AMS software is and how it can help in the growth and productivity of educational institutions.</p>\r\n\r\n<h2>Admission Management System (AMS)</h2>\r\n\r\n<p>An automated Admission Management System is a software tool that helps institutions streamline their online admission process to enhance the overall productivity of operations involved in the enrollment procedure. The functions of an<strong> </strong>Admission Management System software include providing an online platform for students to apply directly and securely to the institution, checking and resolving the inquiries of candidates, managing and maintaining their applications and document submission process, integrating multiple social platforms to connect and share information with students, providing a<strong> </strong>payment management system for fee collection and payslip generation, tracking their admission status, and addressing all the queries of students so that they don&#39;t face any issue during the admission process.&nbsp;</p>\r\n\r\n<h2>Advantages of using AMS Software</h2>\r\n\r\n<p>There are multiple benefits of using an automated <strong>admission management system </strong>software. Some of the advantages are listed below.</p>\r\n\r\n<ul>\r\n	<li>An <strong>admission management system</strong> helps centralize student data by providing an online platform where all applications are collected and stored effectively and securely on a single cloud-based platform.</li>\r\n	<li>AMS software facilitates effective communication between students, educators, and authorized personnel by integrating the software with various communication channels. This helps in sending and receiving messages, updates, notifications, and reminders via SMS, E-Mail, WhatsApp, Telegram, etc.</li>\r\n	<li>AMS software identifies prospective students and informs the sales and marketing team. This helps the team in the better management of leads and converting these leads into pipelines.</li>\r\n	<li>A payment management system is integrated with<strong> </strong>AMS software that helps in collecting and managing payments received by students through various payment gateways. Students can download and print out their payment slips after completing their payments.&nbsp;</li>\r\n	<li>AMS software optimizes the entire admission campaign of an institution by effectively identifying and managing the information of interested candidates and communicating with them on various online platforms.&nbsp;</li>\r\n	<li>The automated <strong><a href=\"https://www.edtechinnovate.com/admission-management-system\">Admission Management System</a></strong> software tool eliminates the need to fill the application form on paper and store all this information manually which requires a lot of time, effort, cost, and infrastructure. This software reduces the scope of error and accurately manages the entire admission process for institutions.</li>\r\n	<li>Students share their personal information such as their contact details, documents, bank account details, etc. when they apply for admission to an educational institution. This information must be protected from any misuse. For this, AMS software limits the access of this data to authorized users only. This data can be accessed promptly and securely by various authorized users at the same time, saving time for the officials and students.</li>\r\n	<li>Student data is centralized using AMS software. This enables the university to examine and monitor information on various aspects of the admissions process more effectively, including statistics, patterns, and admissions predictions. By using this data, future admission cycles can be improved and well-informed decisions can be made by the institutes.</li>\r\n</ul>\r\n\r\n<h2>How Universities Employ AMS Software?</h2>\r\n\r\n<p>The installation of<strong> </strong>AMS software into an institute&rsquo;s system is a very simple and quick process. The steps to be followed by an institution to employ AMS software are as follows.&nbsp;</p>\r\n\r\n<p>1. Capture student inquiries from multiple sources</p>\r\n\r\n<p>2. Track application status</p>\r\n\r\n<p>3. Track student admission&nbsp; journey</p>\r\n\r\n<p>4. Communicate through student and counselor portals</p>\r\n\r\n<p>5. Automate the selection process</p>\r\n\r\n<p>6. Prioritize responses</p>\r\n\r\n<p>7. Advanced Analytics</p>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/difference-between-erp-and-ams\">Difference between ERP and AMS</a></strong></p>\r\n\r\n<h2>Conclusion</h2>\r\n\r\n<p>We have seen what an automated<strong> Admission Management System</strong> is, what are the benefits of using<strong> </strong>AMS software and how this software can be employed by an institution. It is clear that using<strong> </strong>AMS software proves to be time-efficient and cost-effective for both students and officials as it automates the entire admissions process for an institution reliably and securely. So, It is a necessity for educational institutions to employ an efficient and reliable<strong> </strong>AMS software that optimizes their operations and boost the productivity of team members and the organization.</p>\r\n', ' Growth Of Universities Through Admission Management System Software', 'Admission Management System Software', 'A detailed overview of how Admission Management System software in Universities improves daily academic activities like assessments, analytics, student engagement, etc.', 1, '2024-06-13 06:57:29', '2024-06-14 12:24:36'),
(39, 'Future Of University Software Solutions', 'university-management-softwares', '/admin-assets/img/blogs/1718608641.jpg', 'In this blog, we will understand the possible future scope of various university software solutions.', '<p>Within an educational institution, there are various activities and operations conducted related to admissions, administration, communication, academic management, and the conduct and<strong> </strong>administration of exams. An academic institution ensures that these activities and operations are conducted in an accurate and timely manner to offer a seamless educational experience to its students. As the latest developments in the technology sector advance, we can see the implementation of various<strong> </strong>software tools and technologies in the field of<strong> </strong>education. These tools are introduced to streamline the education process and for better management of resources within the institution. In this blog, we will cover these software and their future scope in detail.</p>\r\n\r\n<h2><strong>University Software Solutions</strong></h2>\r\n\r\n<ul>\r\n	<li><strong>Admission Management System (AMS)</strong> - An admission management system aims to improve the efficiency of online <strong>admission</strong> processes of institutions through automation.<strong> </strong>AMS software promotes the institution&#39;s overall growth by improving its operational effectiveness in enrollment-related processes.<strong> <a href=\"https://www.edtechinnovate.com/admission-management-system\">Admission management system</a> software</strong> is employed for providing students secure access to the online application portal, handling queries of candidates, organizing and managing the submission of applications and supporting documentation, integrating social media platforms for student interaction, implementing a payment management system for the collection of fees and generating fee statements, monitoring admission status, and responding to inquiries from students.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Enterprise Resource Planning (ERP</strong>) - ERP is the process of<strong> </strong>organizing, monitoring, communicating, and simplifying an organization&#39;s academic and administrative operations. An automated<strong> </strong>ERP software solution is essential in supporting educational institutions by providing a digital platform that is specifically designed to meet the needs of educational institutions by consolidating and digitizing various administrative tasks. It functions as a single, central point for managing staff and students, organizing exams, maintaining track of fees, and other related activities. This reduces time and money consumption for institutions and ensures the most efficient use of available resources. An online ERP portal improves user communication by strengthening the connections between learners and educators. ERP software enables organizations to function more strategically and economically to boost productivity and promote institutional growth.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Customer Relationship Management (CRM</strong>) - An Education<strong> </strong>CRM is an automated software that helps in sales, marketing, operations, and management<strong> </strong>for educational institutions to increase enrollment of prospective students and effective communication between current students and educators.<strong> <a href=\"https://www.edtechinnovate.com/customer-relationship-management\">Customer Relationship Management</a> software </strong>collects and analyses the data of students from various sources, and enables effective communication with them through multi-channel communication (SMS, WhatsApp, E-mail, etc.). The embedded sales management dashboard aids the sales team in prioritizing leads based on their lead score and the user management system defines the role-based access of the software and secure management of students&#39; data. The automated Payment Management system enables in automation of fee reminders through late fee notifications. An effective education CRM facilitates smooth communication of educational institutions with students and converts leads into enrollment, thus maximizing the productivity and growth of the institution.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Learning Management System (LMS)</strong> - A <strong><a href=\"https://www.edtechinnovate.com/learning-management-system\">Learning Management System</a></strong> is a<strong> </strong>software tool that allows users to create, organize, upload, manage, deliver, and track the course materials including curriculum, timetable, exams, and assignments to the students digitally. LMS software helps in efficient training management through its&rsquo; centralized learning platform that can be integrated with various social media tools and ensures the integrity and reliability of stored information through robust security measures.<strong> </strong>LMS software proves to be highly beneficial for online students as<strong> </strong>LMS provides a user-friendly and modern learning ecosystem through which the students can learn and track their progress through various innovative and easily comprehensible learning resources such as e-books, gamification, e-library, and skills and certification tracking tools.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Online Examination Portal</strong> - The <strong><a href=\"https://www.edtechinnovate.com/online-exam-portal\">Online Examination Portal</a></strong> is a tool that facilitates the online conduction of institutions&rsquo; examinations for students for which they can appear from anywhere, eliminating the need to give tests in classroom settings or test centers. Through an online examination portal, schools and universities can organize, schedule, conduct, and administer the entire examination process with a live proctoring system and cheating-prevention mechanisms. Institutions have access to integrate this online examination portal with LMS software to publish the results of online exams to the students on their user dashboards.</li>\r\n</ul>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/grow-university-through-admissions-management-software\">Growth Of Universities Through Admission Management System Software</a></strong></p>\r\n\r\n<h2><strong>Future Scope</strong></h2>\r\n\r\n<ul>\r\n	<li><strong>AI and Machine Learning</strong> - These software tools will utilize technologies such as machine learning and artificial intelligence that will play a crucial role in better analysis and decision-making processes.</li>\r\n	<li><strong>Customized Education Programs</strong> - Students will have access to customizing their learning experiences with adaptive learning algorithms that will adjust their academic careers based on each student&#39;s unique learning style, skills, and weaknesses.</li>\r\n	<li><strong>Blockchain</strong> - Blockchain is a reliable and secure technology that will help in securely storing and verifying academic <strong>credentials</strong>, <strong>certificates</strong>, and <strong>transcripts</strong>.</li>\r\n	<li><strong>Virtual and Augmented Reality</strong> - Students&rsquo; educational experience will be enhanced through the implementation of Virtual and Augmented Reality technologies. It would help students to learn by immersing themselves in an almost surreal environment.</li>\r\n	<li><strong>Improved Data Privacy and Security</strong> - University software solutions will put great importance on robust cybersecurity measures and data privacy safeguards including multi-factor authentication, advanced encryption, and safe data storage procedures to effectively tackle cyber threats.</li>\r\n	<li><strong>Adaptive Proctoring and Assessment</strong> - To conduct and administer free and secure exams, institutes will employ AI-powered tools that can identify and prevent cheating behaviors during exams.</li>\r\n</ul>\r\n\r\n<h3><strong>Conclusion</strong></h3>\r\n\r\n<p>In this <strong>blog</strong>, we have discussed various<strong> </strong>software tools<strong> </strong>an educational institution employs to streamline its various activities and operations, and for better management of human and financial resources. We have also discussed the future possibilities that lie ahead for these software tools.</p>\r\n', 'University Software Solutions and Future Scope', 'University Software Solutions', 'In this blog, we will understand the possible future scope of various university software solutions.', 1, '2024-06-14 09:55:31', '2024-11-24 18:43:18'),
(40, 'Don\'t Just Manage, Win Customers: 8 Unforgettable CRM Examples', 'customer-relationship-management-crm-examples', '/admin-assets/img/blogs/1718443263.jpg', 'Examples of CRM Software in Use. Here are 8 CRMs available today and examples of how you might use them.', '<p>Creating awareness and getting people enrolled for your institution/organization is one thing, and winning their trust and making them your loyal customers is an entirely different thing. You can get the audience&#39;s attention through marketing campaigns, but maintaining a long-term relationship with them is what organizations/institutions find difficult to manage often. For this purpose, a dedicated cell is designed by an organization/institution known as CRM Customer Relationship Management that looks after the customers and maintains continuous communication with them to solve their queries and provide them with the required information. To simplify this process, you can employ CRM <strong>Customer Relationship Management</strong> software, commonly called CRM software, that would help in automating the process. This would result in minimizing the manual efforts of the experts of the sales and marketing team that can be used for other operations. Also, by employing the best customer relationship management software, the process&#39;s effectiveness and efficiency would be enhanced, significantly saving time and money for your organization/institution. Let us now discuss what are CRM softwares and how they work exactly.</p>\r\n\r\n<h2><strong>About CRM software</strong></h2>\r\n\r\n<p>Customer Relationship Management (CRM) software is an automated software tool employed by organizations and institutions to streamline their sales, marketing, operations, and management functions to boost lead enrollment and establish seamless communication between clients and stakeholders. CRM <strong><a href=\"https://www.edtechinnovate.com/customer-relationship-management\">customer relationship management</a></strong> gathers data from diverse platforms and empowers users to analyze prospect information comprehensively and engage with them efficiently across multiple channels such as SMS, WhatsApp, and email. The CRM softwares are embedded with an integrated sales management dashboard that empowers sales teams to prioritize leads based on their lead scores. This ensures optimal resource allocation and targeted outreach efforts which boost productivity and minimize cost and time for organizations and institutions. Additionally, the robust user management system ensures secure access to the software which safeguards sensitive user data and enables role-based permissions effectively. The integrated automated Payment Management system within the best customer relationship management software simplifies payment processes by automating reminders and late payment notifications and reduces administrative burdens on the authorities involved. Through all these features, the CRM softwares acts as a strong communication channel between customers and the sales and marketing teams.</p>\r\n\r\n<h2><strong>Top 8 examples of how CRM software can help</strong>&nbsp;</h2>\r\n\r\n<ul>\r\n	<li><strong>Lead Centralization</strong> - CRM software provides a unique portal where all the leads captured by the sales and marketing team can be stored at one single centralized location. This helps in identification, management, and communication with the leads effectively and efficiently.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Lead Management</strong> - The leads generated are managed by the CRM software as per their lead scores. This helps in prioritizing better leads and improves the scope of converting these leads into customers.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Sales Management &amp; Automation</strong> - CRM softwares helps in automating the customer relationship management process which greatly reduces the workload on the sales and marketing team. This helps in redirecting the efforts of the team and human resource allocation for the organization.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>User Management</strong> - CRM software helps in user management by maintaining a centralized database of users, creating unique profiles for individual users, and tracking and analyzing their performances. This helps in workflow optimization and communication management with the users.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Marketing Communication &amp; Automation</strong> - CRM software helps in marketing communication and automation through content management, lead capture and segmentation, social media marketing, and providing personalized assistance to customers. These features enable efficient audience engagement, lead cultivation, and company growth for organizations.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Campaign Management</strong> - CRM software improves campaign performance for an organization through Campaign Planning and Scheduling, Multi-Channel Campaign Execution, Campaign Performance Tracking, A/B Testing and Optimization, Campaign ROI Analysis, and Customer Feedback and Insights.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Sales Performance Reports &amp; Analytics</strong> - CRM softwares provides a specialized dashboard for gathering and analyzing sales performance reports and analytics. This helps an organization to analyze the collected data and helps in better decision-making for future marketing campaigns.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Payment Management</strong> - An efficient payment management dashboard is integrated with CRM software that helps in facilitating payment gateways, notifications and reminders on late payments, withdrawals, refunds, and generation of fee payment transcripts.</li>\r\n</ul>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/university-management-softwares\">Future Of University Software Solutions</a></strong></p>\r\n\r\n<h2><strong>Conclusion</strong></h2>\r\n\r\n<p>In conclusion, well-implemented CRM softwares helps in establishing seamless communication with clients, transforming leads into conversions, and driving business productivity and growth of organizations and institutions. Through the above-provided examples, you can see how significantly the best customer relationship management software can improve the functioning of client-stakeholder relationships and enhance the growth of your business. Select the right CRM software for your organization/institution that best suits your needs and requirements.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '8 Best Customer Relationship Management Examples', 'customer relationship management', 'Examples of CRM Software in Use. Here are 8 CRMs available today and examples of how you might use them', 1, '2024-06-15 09:18:34', '2024-06-15 09:21:03'),
(41, 'Types Of Learning Management Systems', 'types-of-learning-management-systems', '/admin-assets/img/blogs/1718688506.jpg', 'Commercial Learning Management Systems are available in two main forms based on the deployment mode - Installed or On-Premise and Cloud Hosted or SaaS.', '<p>If you are searching for a workday learning management system for your learning and training purpose in your organization/institution but are confused about which<strong> types of learning management system software</strong> would be best suited for your needs and requirements, then this blog is for you. In this blog, we will understand the different <strong>types of LMS </strong>and what are the differences between these software systems so that you can make well-informed decisions before employing LMS software in your institution/organization. First of all, let us discuss what exactly is a learning management system software and why you need it.</p>\r\n\r\n<h2>About LMS Software</h2>\r\n\r\n<p>An automated workday&nbsp;<strong><a href=\"https://www.edtechinnovate.com/learning-management-system\">Learning Management System</a></strong> software is a software tool that helps an institution create, upload, store, manage, deliver, collect, and track the specific content created for their students or employees. This LMS software is mainly used for learning and training purposes by providing essential resources to the targeted audience. For example, if an institution is organizing online courses for their students, then that institution needs to employ a learning management system software through which the course curriculum would be imparted to the students. This will facilitate the delivery of course resources such as syllabus, assignments, timetables, exam schedules, and information regarding various events and activities conducted by the institution to the students effectively and would save time and money for both the institution and the students. Apart from this, the institution would also have access to track the academic progress of their students which would help in providing personalized guidance and improve the overall educational experience for the students. Through the workday learning management system, students would be able to have efficient communication with their educators and the administration staff of the institution in case of any queries.&nbsp;</p>\r\n\r\n<h2>Types of LMS Software</h2>\r\n\r\n<h3><strong>Based on platform</strong></h3>\r\n\r\n<ul>\r\n	<li><strong>Cloud-based LMS</strong> - Cloud-based LMS, or Web-based LMS is an example of LMS that is hosted on remote servers via the Internet and typically offers a range of features for creating, delivering, and managing online courses.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Open-source LMS</strong> - Open-source LMS software is freely available and provides users the accessibility to modify, customize, and distribute the source code. This provides users with higher flexibility, customization, and community collaboration opportunities.&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Mobile LMS</strong> - The LMS software that is specially designed to operate through mobile devices as some user prefer operating LMS software on their mobile for better accessibility and participation in activities.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Blended Learning LMS </strong>- Blended LMS combines online and offline learning elements for better interaction between students and educators.</li>\r\n</ul>\r\n\r\n<h3><strong>Based on the Use Case of LMS</strong></h3>\r\n\r\n<ul>\r\n	<li><strong>Enterprise LMS</strong> - Enterprise<strong> LMS software</strong> is designed according to the needs and requirements of various enterprises including MNCs, industries, government agencies, and NGOs. This software is embedded with customized tools for the learning and training of employees and delivering information to the clients.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Extended Enterprise LMS</strong> - Extended Enterprise LMS software is employed to cater to the users outside of an enterprise which includes partners, customers, vendors, suppliers, franchisees, dealers, and any other external stakeholders.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Academic LMS</strong> - This type of LMS software is specially developed according to the needs and requirements of educational institutions for the creation, management, and delivery of course curricula to students.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Specialized LMS</strong> - Certain individuals and organizations need certain distinct features in their LMS software. Specialized LMS is specially developed software that caters to the needs of these individuals and organizations.</li>\r\n</ul>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/customer-relationship-management-crm-examples\">Don&#39;t Just Manage, Win Customers: 8 Unforgettable CRM Examples</a></strong></p>\r\n\r\n<h3>Based on Integration Capabilities</h3>\r\n\r\n<ul>\r\n	<li><strong>Integrated LMS</strong> - The types of LMS that provide the accessibility of integrating it with other systems of an institution or organization for better management of the processes are referred to as Integrated LMS software</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Non-integrated LMS</strong> - This type of LMS software is not integrated with other systems such as CRM or ERP software and functions independently within an organization.</li>\r\n</ul>\r\n\r\n<h2>Conclusion</h2>\r\n\r\n<p>Now that you have understood the<strong> types of LMS,</strong> you can choose the right workday learning management system software that would fit your needs and would work effectively for your organization/institution. It must be noted that there are various factors such as the Training Goals and Objectives, User Needs and Preferences, Scalability and Flexibility, Integration Requirements, Content Management and Delivery, User Experience, Support, Security and Compliance, Reliability, Innovation, and pricing and subscription fee of the software before choosing the<strong> best LMS platforms for your organization</strong>. In conclusion, have an in-depth analysis of the example of LMS and its suitability in your organization/institution before selecting and implementing the <strong>best LMS platforms </strong>to boost the productivity and growth of your business and engagement.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Types Of Learning  Management Systems', 'Types of LMS', 'A well-known type of learning software solution is the free learning management systems which are known as \'open-source software.', 1, '2024-06-17 09:24:31', '2024-11-24 18:41:15');
INSERT INTO `blogs` (`ID`, `Name`, `Slug`, `Photo`, `Description`, `Content`, `Meta_Title`, `Meta_Key`, `Meta_Description`, `Status`, `Created_At`, `Updated_At`) VALUES
(42, 'The Future Of Learning Is Here: Your Guide To Choosing The Right LMS', 'choose-the-right-lms-platform', '/admin-assets/img/blogs/1718789139.webp', ' Choosing the right LMS is important. This article offers a roadmap to navigate the complex landscape of LMS options.', '<p>We can see that there has been an ongoing change in the way education is being delivered in recent times. Now, online learning is becoming more and more famous among the aspiring learners. This is because online education offers flexibility in learning for the students. Now, it is not essential to pursue courses in traditional classroom settings, rather students now can access courses online from the comfort of their preferred locations. However, the course curriculum must be imparted to the students efficiently and effectively for online learning. For this purpose, institutions employ digital Learning management systems for schools software that provide the essential features and resources for better learning experiences. However, selecting the right LMS software is crucial for institutions as the LMS plays an important role in the effective delivery of education to students.</p>\r\n\r\n<h2>LMS Software - Future of Learning</h2>\r\n\r\n<p>A <strong><a href=\"https://www.edtechinnovate.com/learning-management-system\">Learning management systems</a></strong> (LMS) software is a specially designed software tool that lets students access their course resources online. The availability of various features such as Course, Assignment, Exam &amp; Time Table Management, Personalized Learning Portals, Multilingual Interface, Social Learning Tools, Gamification, and Progress Tracking helps in making the delivery of education engaging for students in an innovative manner. Learning management systems for schools enable the digital creation, organization, delivery, and tracking of course materials that centralize training management, integrate with social media tools, and ensure data security for user data protection. This software is beneficial for students as it offers a user-friendly learning ecosystem with innovative resources like e-books and skills tracking. It is postulated that Learning management systems for schools are the tool of the future for education delivery among students.&nbsp;</p>\r\n\r\n<h2>Factors to consider when choosing the right LMS software</h2>\r\n\r\n<p>There are different <strong><a href=\"https://www.edtechinnovate.com/blog/types-of-learning-management-systems\">types of learning management system</a></strong> sotware but choosing the right&nbsp;Learning management systems for schools that align with the specific needs of the institution is of utmost importance. For this purpose, various factors must be considered before selecting the LMS software for your institution. These factors are described in detail below.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>User Interface</strong> - Students can effectively engage with the course content only if the software interface is user-friendly instead of complicated for them. Institutions must employ LMS software that is easy to use and offers course resources in a simplified manner.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Features</strong> - Institutions need to select the LMS software that is equipped with all the necessary features. The availability of user configuration, course materials, recorded lectures, e-library services, assignment submission, students&#39; academic progress tracking, and various other features must be available for the students as well as for the instructors for an innovative and engaging educational experience.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Scalability</strong> - Institutions need to utilize LMS software that can handle the increasing number of students as the scope of enrollment in online courses is higher. Colleges/Universities must select the right software that is well-suited for online education even in the face of a larger pool of students.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Flexibility</strong> - The Free learning management systems for schools must cater to the specific needs of the students and the institution by offering customization and configuration. This helps the institution to provide a unique learning experience that aligns with its personalized curriculum, teaching methods, and administrative requirements.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Technical Support</strong> - There are always chances that students or the institution may face some technical issues while using the software. For this purpose, the LMS software must be equipped with robust technical support for a smooth learning experience for the students.&nbsp;&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Data Security </strong>- The data collected from the users is personal and must be protected from any third-party misuse or theft. While choosing the LMS software, the institution must ensure that the software is well-equipped with robust data security features.&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Pricing</strong> - Budget varies from institution to institution. Institutions must check the prices at which the LMS software is being offered to them. It must be ensured that the price should not be so low that it compromises on the essential features and must not be so high that it goes out of the budget.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Integration with other platforms</strong> - For an engaging learning experience, the LMS software must include the feature of integrating with other social media platforms. Through this, the students are not limited only to the software but can utilize other platforms for learning as well.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Community Support</strong> - The Learning management systems for schools should facilitate connections among students through user communities, forums, and resource sharing. These platforms provide valuable opportunities for students to engage with one another, exchange learning experiences, and share best practices.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Accessibility</strong> - The Free learning management systems for schools must provide accessibility to students coming from diverse backgrounds. For example, the option of interacting with the curriculum in various languages must be provided in the software.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><strong>Innovation</strong> - The education sector is an ever-evolving field and the software must adapt to the latest developments. Institutions, while selecting LMS software, must choose the tool that demonstrates a commitment to staying current with evolving technology and trends in online learning.</li>\r\n</ul>\r\n\r\n<p><strong>Read Also</strong>- <a href=\"https://www.edtechinnovate.com/blog/grow-university-through-admissions-management-software\"><strong>Grow Your Universities through Admission Management Software</strong></a></p>\r\n\r\n<h3>Conclusion</h3>\r\n\r\n<p>As online learning continues to reshape education, choosing the right Learning management systems for schools is paramount for institutions aiming to deliver effective and engaging learning experiences. Institutions can ensure a seamless transition to digital education by considering factors like user interface, scalability, flexibility, data security, and community support. Prioritizing innovation and adaptability in Free learning management systems for schools selection is key to keeping pace with the evolving landscape of online learning.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'How To Choose The Right LMS Platform', 'Choose The Right LMS Platform', ' Choosing the right LMS is important. This article offers a roadmap to navigate the complex landscape of LMS options.', 1, '2024-06-18 09:39:08', '2024-06-19 09:25:39'),
(43, '10 Reasons Why Colleges Need Admission Software', 'why-colleges-need-admissions-management-software', '/admin-assets/img/blogs/1718791236.jpg', 'An admission management system is a digital solution designed to handle all aspects of the student admission process.', '<p>One of the key tasks of an institution is the effective conduction of the admission process for prospective students. This process proves to be very cumbersome as it involves providing simplified admission forms for students, managing their information and documents, providing a payment gateway for fee submission, providing students with communication channels to connect with the administration, and capturing their inquiries for further improvement in the admission process. This process becomes more hectic if conducted manually. That&rsquo;s why, an automated Admissions management software has been designed to ease this process for institutions. Not only does this Admissions software for universities digitalize the entire process, thus saving time and costs, but it also improves the preciseness and efficiency of the admission system. In this blog, we will understand why colleges need Admissions management software software and how it helps in capturing and managing the applications of applicants.</p>\r\n\r\n<h2>Why do Colleges need an AMS software?</h2>\r\n\r\n<p>As the Admissions software for universities automates the entire admission process for the institutions, it helps in optimizing the resources for the institution. From providing the online admission form for students to apply for the courses to providing payment gateways to maintaining communication via multiple channels to managing their applications effectively, Admissions management software does it all for the institution. Also by providing the best college admissions software to the students, an institution can expect to observe a rise in the number of enrollments as capturing inquires of the students becomes easy, and through a feedback system, the institution can deliver the needs of the students. Below are some of the other benefits of using AMS software.</p>\r\n\r\n<h2>10 benefits of using AMS software</h2>\r\n\r\n<p><strong>Online Application Form Submission</strong> - Admissions management software digitalizes the entire form-filling and submission process, thus eliminating the need for students to submit their applications manually to the college administration. This greatly helps in saving time and money for both students and institutions.</p>\r\n\r\n<p><strong>Documentation Management</strong> - Collecting information and documents of the prospective students and storing it securely is crucial for the institutions. <strong><a href=\"https://www.edtechinnovate.com/admission-management-system\">Admission Management System</a></strong> software helps in this process by providing a secured cloud-based platform installed with robust security measures and restricted access.</p>\r\n\r\n<p><strong>Admission Status Monitoring</strong> - Admissions management software effectively collects, stores, manages, and tracks all the student&#39;s applications and displays them in an organized manner. Through this simplified information management, Institutions can easily track the progress of the applicants and prioritize them according to the admission criteria set by that institution.</p>\r\n\r\n<p><strong>Automated Fee Payment System</strong> - To complete the admission process, students are required to pay the admission fee. For this purpose, a payment management system is embedded in the Admissions software for universities that provides multiple payment options for students to pay their admission fees and easily register themselves for their preferred courses.</p>\r\n\r\n<p><strong>Integration of Multiple Programs</strong> - During the admission process, it is crucial for institutions to maintain continuous communication with the applicants. This is because students are often confused during their admission process and the institution must clear all their queries for transparency. AMS software helps institutions integrate their application management system with various social media platforms for better connectivity with the students.</p>\r\n\r\n<p><strong>Addressing queries</strong> - One of the options provided in the best college admissions software is capturing and addressing all the queries raised by students during their admission process. This helps in building the reliability of the institution among the students.&nbsp;</p>\r\n\r\n<p><strong>Feedback Management</strong> - Feedback Management installed in the Admissions software for universities gathers all the feedback provided by the applicants. This feedback helps the institution to further optimize its admission process to provide a streamlined experience for students.</p>\r\n\r\n<p><strong>Admission Support</strong> - Students often require support at various stages of their enrollment process. AMS software facilitates admission support from the institution&rsquo;s authorities for the students from which they can receive guidance on how to go on with their applications.</p>\r\n\r\n<p><strong>Report Analytics</strong> - The best college admissions software provides institutions with reports of the applications in a simplified manner. This helps institutions analyze their application process effectiveness and come out with better solutions for maximizing their enrollments in the future.</p>\r\n\r\n<p><strong>Notifications and Reminders</strong> - Through an Admissions management software tool, institutions can send reminders and notifications to students regarding their application status, payments, verification, and acceptance to a program.&nbsp;</p>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/choose-the-right-lms-platform\">The Future Of Learning Is Here: Your Guide To Choosing The Right LMS</a></strong></p>\r\n\r\n<h3>Conclusion</h3>\r\n\r\n<p>Institutions are mainly focused on streamlining their admission process by providing essential support to the students while optimizing their resources to save time and cost. Admissions management software offers essential features to the institutions for this purpose. This best college admissions software is customizable to suit the diverse needs of institutions. In conclusion, Admissions software for universities can help institutions on a larger scale in optimizing their enrollment process and boost the productivity of the institution.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Colleges Need Admission Software System', 'Admissions management software', 'An admission management system is a digital solution designed to handle all aspects of the student admission process.', 1, '2024-06-19 10:00:36', '2024-06-19 10:00:36'),
(44, 'How Do Learning Management Systems Impact Learning And Training In The Education Sector?', 'impact-of-learning-management-systems-on-education', '/admin-assets/img/blogs/1718962313.webp', 'Discover the best online learning platforms suited for learners and online instructors who want to create, market, and sell online courses.', '<p>For an educational institution, one of the most important tasks is to provide the right training, guidance, and education to their students, and to achieve this, educational institutions employ various tools and methodologies such as highly qualified and experienced faculty, meticulously crafted course curriculum that aligns with the industrial standards, and other facilities like library services, placement cell, etc. But to ensure that all these resources are effectively delivered to the students, institutions need to implement an efficient learning management system. Students, educators, and the administrative staff can access these <strong>LMS platforms for education</strong> to foster an innovative and engaging learning environment within the institution. In this blog, we will understand in detail the impact of the Learning Management System on the learning and training of students in the education sector.</p>\r\n\r\n<h2><strong>About Learning Management System</strong></h2>\r\n\r\n<p>Learning Management Systems (LMS) are automated software solution tools <strong>(online learning platforms for education</strong>) that help users create, organize, deliver, and track course materials including curriculum, timetables, exams, and assignments in a digital format. LMS software offers a comprehensive training management system to improve the learning experiences of students with precision and ease. One of its key functionalities is the ability to streamline training operations via a unified platform, simplifying content delivery to the students and establishing communications between users including students, educators, and administrative staff through seamless integration with diverse social media channels. The online learning platforms for education also ensure the sanctity and confidentiality of stored data of users through robust security features to prevent any misuse or data theft from third parties. <strong>LMS platforms for education</strong> offer various features for online learners to provide flexibility and affordability in learning. The <strong>learning management platforms</strong> are designed with a user-centric approach to provide multiple learning resources such as e-books, recorded lectures, gamified modules, e-library facilities, and skill and certification tracking tools.</p>\r\n\r\n<h2><strong>How does LMS software help?</strong></h2>\r\n\r\n<ul>\r\n	<li><strong>Eliminating Geographic Barriers</strong> - <strong><a href=\"https://www.edtechinnovate.com/learning-management-system\">Learning Management System</a></strong> software provides a communication channel for users to interact and engage digitally. This helps in eliminating the geographical barrier by sharing the information through the web.</li>\r\n	<li><strong>Customized Learning</strong> - LMS software provides flexibility in the learning process for the users by including features such as online lectures, e-library services, flexible timetable schedules, gamified modules, etc. through which they can learn at their preferred pace without compromising on their other commitments.</li>\r\n	<li><strong>Accessibility for Diverse Needs</strong> - LMS platforms for education don&rsquo;t work on the principle of one method that fits all. Through this software, institutions can provide personalized support to students according to their diverse needs.</li>\r\n	<li><strong>Optimal Resource Allocation</strong> - The online learning platforms for education enable effective distribution of course resources to students and efficient communication channels between users for better engagement. This helps institutions in the optimization of their resources, thus minimizing unnecessary time and costs.</li>\r\n	<li><strong>Cost-Efficiency</strong> - Through learning management platforms, the various activities and operations are conducted digitally. This helps institutions to reduce their expenditure on physical infrastructure and manual communication channels.</li>\r\n	<li><strong>Innovation and Development</strong> - LMS software is designed according to the latest developments in the Edtech sector and provides scope for further innovation and development in education for students and institutions.</li>\r\n	<li><strong>Improved Tracking and Assessment</strong> - LMS software helps institutions track and access the performance of a large number of students digitally, which proves to be a troublesome task if performed manually.</li>\r\n	<li><strong>Improved Communication</strong> - As the users communicate online through LMS platforms for education, educators and administration staff can capture the inquiries of the students more easily. This helps in better communication and transparency within the institution.</li>\r\n	<li><strong>Integration Capabilities</strong> - Learning management platforms can be integrated with other systems employed in the organization such as ERP, CRM, AMS, and online examination portal, which would help streamline all the activities and operations of the institution.</li>\r\n</ul>\r\n\r\n<p><strong>Also Read-&nbsp;<a href=\"https://www.edtechinnovate.com/blog/why-colleges-need-admissions-management-software\">10 Reasons Why Colleges Need Admission Software</a></strong></p>\r\n\r\n<h3><strong>Conclusion</strong></h3>\r\n\r\n<p>In conclusion, the Learning Management System plays a pivotal role in the effective and efficient delivery of learning through <strong>online learning platforms for education</strong> to the students. This significantly improves the performance of students and helps educators to impart the course curriculum to the students. Administrative staff can also utilize this software to convey their messages to the connected users and capture their inquiries for feedback. You must carefully consider whether the <strong>learning management platforms</strong> are equipped with all the necessary features and tools that are required in your institution and employ the software to optimize the learning process and boost the productivity of your institution.</p>\r\n', ' Best online learning platforms for education', 'online learning platforms for education', 'Discover the best online learning platforms suited for learners and online instructors who want to create, market, and sell online courses.  ', 1, '2024-06-21 09:31:53', '2025-02-17 22:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `blogsfaq`
--

CREATE TABLE `blogsfaq` (
  `id` int(255) NOT NULL,
  `blog_id` int(255) NOT NULL,
  `questions` text NOT NULL,
  `answers` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogsfaq`
--

INSERT INTO `blogsfaq` (`id`, `blog_id`, `questions`, `answers`, `status`, `created_at`, `updated_at`) VALUES
(52, 35, ' How can online examination systems benefit educational institutions like schools, colleges, and universities?', '<p>Online Examination System is a software tool that lets the institution create, upload, conduct, and analyze the various formats of exams for students securely and transparently. Students have the accessibility to appear for their exams from their preferred location without the need to physically appear at the test centers. These are the reasons that make an online examination system highly beneficial for educational institutions.</p>\r\n', 1, '2024-06-08 07:27:29', '2024-06-12 11:30:26'),
(56, 35, 'What features should I look for when choosing an online examination system for my educational institution?', '<p>An effective <strong>online exam management system</strong> needs to have several features, including automated scheduling, automation of planning and scheduling, assessment pattern creation, question bank management, question configuration, multi-language support, custom test-taking options, notifications, LMS integration, <strong>E-assessment solutions</strong>, configurable roles and permissions, online proctoring, reports and dashboards, and automated evaluation.</p>\r\n', 1, '2024-06-13 05:52:20', '2024-06-13 05:52:20'),
(57, 35, 'How does remote proctoring work in online examination systems, and how can it ensure exam integrity?', '<p>Online Examination System comes with a robust cheating prevention mechanism that includes tools like video and AI proctoring, audio proctoring, Identity Verification, Browser Lockdown, Time Limits, Environment Check, and Restricted Access. These tools help in the efficient administration of exams by offering integrity and transparency.</p>\r\n', 1, '2024-06-13 05:53:06', '2024-06-13 05:53:06'),
(58, 35, 'Can online examination systems accommodate different types of assessments, such as multiple-choice, essay, or practical exams?', '<p>Yes. Educational Institutions or other organizations have the accessibility to conduct different types of assessments, such as multiple choice, essay writing, and practical exams by using the various features provided in the software.</p>\r\n', 1, '2024-06-13 05:53:46', '2024-06-13 05:53:46'),
(59, 40, 'Q1. What are the main benefits of CRM?', '<p>There are multiple benefits of using CRM software. Some of these benefits include Customer Service and Retention, Increased Sales, Analytics, Higher Productivity, New lead generation, Better Marketing, Improved Communication, and Increased Profitability.</p>\r\n', 1, '2024-06-15 09:28:34', '2024-06-15 09:28:34'),
(60, 40, 'Q2. What are the 5 phases of CRM?', '<p>The 5 phases of CRM are as follows - data collection, customer entry, customer interactions, analysis and strategy, and feedback and improvement.</p>\r\n', 1, '2024-06-15 09:29:00', '2024-06-15 09:29:00'),
(61, 40, 'Q3. What are the major components of CRM?', '<p>Lead generation and management, Salesforce automation, Marketing workflow automation, Customer service and support, Marketing campaigns, Business reporting and analytics, and Integration capabilities are some of the major components of CRM software.</p>\r\n', 1, '2024-06-15 09:29:26', '2024-06-18 06:12:35'),
(62, 40, 'Q4. What is the CRM customer relationship management process?', '<p>Customer Relationship Management is the process of maintaining a continuous connection with current clients and potential customers. This process helps an organization to increase its profitability by attracting new customers and gaining the loyalty of existing customers.</p>\r\n', 1, '2024-06-15 09:29:59', '2024-06-18 06:12:13'),
(63, 41, 'Q1. How can an LMS benefit educational institutions?', '<p>LMS software greatly benefits educational institutions by providing essential features for the effective and efficient delivery of educational resources to students. Through LMS software, educational institutions can create, manage, publish, and deliver course materials for the students and track and analyze their performance for better personalized guidance to the students. Also, the facility of a multi-communication channel enables smooth communication between the users, and a feedback mechanism helps in innovation and engagement.</p>\r\n', 1, '2024-06-17 09:25:25', '2024-06-17 09:25:25'),
(64, 41, 'Q2. What are some common challenges associated with implementing a Learning Management System?', '<p>Some of the common challenges associated with Usecase of LMS while implemented by any educational institution are Resistance to Change, Lack of Technical Expertise, Integration with Existing Systems, Content Migration and Management, Data Security and Privacy, User Engagement and Motivation, and Accessibility and Inclusivity.</p>\r\n', 1, '2024-06-17 09:26:03', '2024-06-18 05:30:19'),
(65, 41, 'Q3. What kind of businesses need an LMS?', '<p>Various types of businesses can employ LMS software within their organization for the training and education of students/employees. Some of the businesses that generally install LMS software within their framework are Corporate Enterprises, Educational Institutions, Healthcare Organizations, Retail and Hospitality, Financial Services, and Government Agencies.</p>\r\n', 1, '2024-06-17 09:26:30', '2024-06-18 05:30:33'),
(66, 42, 'Q1. What factors should I consider when choosing a learning management system?', '<p>Various factors need to be considered while choosing a learning management system such as User Interface, Features, Scalability, Flexibility, Technical Support, Data Security, Pricing, Integration with other platforms, Community Support, Accessibility, and Innovation.</p>\r\n', 1, '2024-06-18 09:40:28', '2024-06-18 09:40:28'),
(67, 42, 'Q2. How can I determine which learning management system best fits the needs of my organization?', '<p>Before selecting an LMS software for your organization, it is important to understand the specific needs and requirements of your organization. After understanding your needs, you must check whether the LMS software tool is equipped with all your requirements. Also, the pricing of the LMS software acts as a crucial factor when selecting the software tool.</p>\r\n', 1, '2024-06-18 09:41:17', '2024-06-18 09:41:17'),
(68, 42, 'Q3. Are there any key features that I should prioritize when evaluating different learning management systems?', '<p>There are multiple key features that you must consider when evaluating different learning management system software. These are Management of content, Roles and user management, Reliable analytics and reporting, Growth and scalability, Adaptive layout Customization possibilities, Creation of assessments, Support for compliance Integration with current systems, and Features for user engagement.</p>\r\n', 1, '2024-06-18 09:41:48', '2024-06-18 09:41:48'),
(69, 44, 'Q1. How can an LMS benefit educational institutions?', '<p>LMS software greatly benefits educational institutions by providing an automated platform through which course resources such as course curriculum, online lectures, exams, timetable scheduling, and other materials can be delivered to the students and track their progress.</p>\r\n', 1, '2024-06-21 09:33:31', '2024-06-21 09:33:31'),
(70, 44, 'Q2. What is the difference between LMS and MIS?', '<p>Information and business activities inside an organization are managed by a Management Information System (MIS), whereas Learning Management Systems (LMS) are centered on educational processes, content delivery, and learning tracking.</p>\r\n', 1, '2024-06-21 09:34:07', '2024-06-21 09:34:07'),
(71, 44, 'Q3. What are the key differences between a learning management system (LMS) and other types of learning platforms, such as learning experience platforms (LXPs) or course marketplaces?', '<p>Online learning platforms such as Learning Experience Platforms (LXP) or course marketplaces are focused on hosting online course content. Whereas, the Learning Management System (LMS) software does much more than just that. This software tool also provides features that facilitate performance tracking, notification and reminders, payment dashboard, and communication channels, among others.</p>\r\n', 1, '2024-06-21 09:34:50', '2024-06-21 09:34:50'),
(72, 33, 'Q1. How do the functionalities of ERP and AMS differ?', '<p>ERP systems are designed to unify and streamline business processes across an organization, while AMS focuses on the ongoing support and optimization of specific applications. Both are crucial for different aspects of IT management and business operations.</p>\r\n', 1, '2024-07-26 11:48:42', '2024-07-26 11:49:45'),
(73, 33, 'Q2. Who typically uses ERP systems and AMS?', '<p><strong>ERP:</strong> Typically used by executives, department heads, operational staff, and IT professionals to manage and integrate various business processes across an organization.</p>\r\n\r\n<p><strong>AMS:</strong> Typically used by IT support teams, application managers, developers, business analysts, and end users to support, maintain, and optimize specific software applications.</p>\r\n', 1, '2024-07-26 11:52:44', '2024-07-26 11:52:58'),
(74, 33, 'Q3. Can AMS be used for ERP systems?', '<p>Yes, Application Management Services (AMS) can indeed be used for managing ERP (Enterprise Resource Planning) systems. AMS provides a range of services that are crucial for maintaining, supporting, and optimizing ERP systems, ensuring they function effectively and meet organizational needs.</p>\r\n', 1, '2024-07-26 11:54:27', '2024-07-26 11:54:27'),
(75, 38, 'Q1. Is Admission Management System only for Big Universities?', '<p>No, an Admission Management System (AMS) is not only for big universities. While large universities often use AMS to handle their complex admissions processes due to their scale, smaller institutions, including colleges, vocational schools, and even K-12 schools, can also benefit significantly from such systems.</p>\r\n', 1, '2024-07-26 11:56:59', '2024-07-26 11:56:59'),
(76, 38, 'Q2. What are the benefits of an admission management system?', '<p>An Admission Management System enhances the efficiency, accuracy, and overall effectiveness of the admissions process. By automating tasks, centralizing data, and providing valuable insights, AMS improves the experience for both applicants and staff, supports informed decision-making, and ensures a more streamlined and compliant admissions operation.</p>\r\n', 1, '2024-07-26 12:18:31', '2024-07-26 12:19:57'),
(77, 38, 'Q3. How is an Admission Management Software different from an ERP?', '<p>Admission Management Software (AMS) is specialized software designed specifically to manage the admissions process, focusing on application tracking, communication, and enrollment. Enterprise Resource Planning (ERP) systems, on the other hand, provide a comprehensive suite of integrated applications that manage a wide range of business processes across an organization.</p>\r\n', 1, '2024-07-26 12:19:21', '2024-07-26 12:20:08'),
(78, 39, 'Who needs a university management system?', '<p>A University Management System is essential for various stakeholders within a higher education institution. It supports administrators, faculty, students, admissions staff, financial officers, IT professionals, alumni relations, and academic advisors by providing tools to streamline processes, improve efficiency, and enhance communication.</p>\r\n', 1, '2024-07-26 12:27:32', '2024-07-26 12:27:32'),
(79, 39, 'Are university management software solutions customizable?', '<p>University management software solutions are highly customizable to accommodate the diverse needs of educational institutions. Customization allows universities to adapt the software to their specific processes, integrate with existing systems, and tailor features and functions to better serve their students, staff, and administrators.</p>\r\n', 1, '2024-07-26 12:31:40', '2024-07-26 12:31:40'),
(80, 39, 'What security measures should universities look for in a university management software?', '<p>When evaluating university management software, universities should prioritize security measures that ensure data protection, integrity, and privacy. This includes robust encryption, access controls, regular backups, compliance with data privacy regulations, secure development practices, and effective incident response strategies</p>\r\n', 1, '2024-07-26 12:32:47', '2024-07-26 12:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `blogs_service`
--

CREATE TABLE `blogs_service` (
  `ID` int(255) NOT NULL,
  `Name` text DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Content` longtext DEFAULT NULL,
  `Meta_Title` varchar(255) DEFAULT NULL,
  `Meta_Key` varchar(255) DEFAULT NULL,
  `Meta_Description` text DEFAULT NULL,
  `Status` int(2) NOT NULL DEFAULT 1,
  `Products_ID` int(255) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs_service`
--

INSERT INTO `blogs_service` (`ID`, `Name`, `Slug`, `Photo`, `Description`, `Content`, `Meta_Title`, `Meta_Key`, `Meta_Description`, `Status`, `Products_ID`, `Created_At`, `Updated_At`) VALUES
(6, 'deepak', 'edaee', '/admin/admin-assets/img/blogs_service/1757748997.jpg', 'iytrewwqwer', '<p>wetrewwer</p>\r\n', 'weertrewe', 'wertyrewwer', 'werwertrewerewerewe', 1, 3, '2025-09-12 07:08:53', '2025-09-13 07:36:36'),
(7, 'test', 'test', '/admin/admin-assets/img/blogs_service/1757749010.jpg', 'test', '<p>xaxasxsaxas</p>\r\n', '', '', '', 1, 3, '2025-09-12 07:25:47', '2025-09-13 07:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `clients_logos`
--

CREATE TABLE `clients_logos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `products_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_logos`
--

INSERT INTO `clients_logos` (`id`, `name`, `logo`, `status`, `created_at`, `updated_at`, `products_id`) VALUES
(25, 'test1223123', '/admin/admin-assets/img/clients_logos/1757356051.jpg', 1, '2025-09-08 18:27:31', '2025-09-08 18:27:31', 3),
(26, 'qwdwqdwqd', '/admin/admin-assets/img/clients_logos/1757407699.jpg', 1, '2025-09-09 08:48:18', '2025-09-11 12:33:05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faq_service`
--

CREATE TABLE `faq_service` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `answers` text NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_service`
--

INSERT INTO `faq_service` (`id`, `products_id`, `questions`, `answers`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Is my customer data secure?', '<p>Absolutely. Our CRM uses advanced encryption, role-based access, and regular backups to ensure your customer data is safe and compliant with industry standards.</p>\r\n', '1', '2025-09-11 12:47:18', '2025-09-12 05:29:27'),
(2, 3, 'Can I integrate the CRM with my existing tools?', '<p>Yes, most modern CRMs integrate with popular tools like email platforms, payment gateways, marketing software, and project management apps to streamline your workflow.</p>\r\n', '1', '2025-09-11 12:49:30', '2025-09-12 05:29:06'),
(3, 3, 'What is a CRM system and why do I need it?', '<p>A <strong>CRM </strong>(Customer Relationship Management) system helps businesses manage customer interactions, sales, and support in one place. It improves communication, tracks leads, and builds stronger relationships.</p>\r\n', '1', '2025-09-12 04:57:34', '2025-09-12 05:28:37'),
(4, 3, 'Do I need technical skills to use this CRM?', '<p>No. The CRM is designed with an easy-to-use interface. Most tasks can be done without technical knowledge, and we provide training and support.</p>\r\n', '1', '2025-09-12 05:29:47', '2025-09-12 05:29:47'),
(5, 3, 'Can the CRM grow with my business?', '<p>Yes. Our CRM is fully scalable &mdash; you can start with basic features and add advanced modules like automation, analytics, and AI tools as your business expands.</p>\r\n', '1', '2025-09-12 05:31:54', '2025-09-12 05:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `image_name` varchar(500) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `video_link`, `image_name`, `image_link`, `status`, `Created_At`, `Updated_At`) VALUES
(35, NULL, 'Ceremony', '/admin-assets/img/gallery/1716280772.jpg', 1, '2024-05-20 14:06:35', '2024-05-21 08:39:31'),
(36, NULL, 'Office Premises', '/admin-assets/img/gallery/1716280736.jpg', 1, '2024-05-20 14:33:04', '2024-05-21 08:38:56'),
(37, NULL, 'EDTech Family', '/admin-assets/img/gallery/1716280829.jpg', 1, '2024-05-21 06:05:32', '2024-06-10 04:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE `gallery_image` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_image`
--

INSERT INTO `gallery_image` (`id`, `gallery_id`, `image_url`, `status`, `Created_At`, `Updated_At`) VALUES
(88, 36, '/uploads/o1.jpg, /uploads/o2.jpg, /uploads/o3.jpg, /uploads/o4.jpg, /uploads/o5.jpg, /uploads/o6.jpg, /uploads/o7.jpg', 1, '2024-05-21 09:02:27', '2024-06-10 04:51:43'),
(89, 35, '/admin-assets/img/gallery_image/1716282309_0.jpg, /admin-assets/img/gallery_image/1716282309_1.jpg, /admin-assets/img/gallery_image/1716282309_2.jpg, /admin-assets/img/gallery_image/1716282309_3.jpg, /admin-assets/img/gallery_image/1716282309_4.jpg, /admin-assets/img/gallery_image/1716282309_5.jpg', 1, '2024-05-21 09:05:08', '2024-06-07 09:58:17'),
(90, 37, '/admin-assets/img/gallery_image/1716282544_0.jpg, /admin-assets/img/gallery_image/1716282544_1.jpg', 1, '2024-05-21 09:09:03', '2024-06-07 09:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_video`
--

CREATE TABLE `gallery_video` (
  `id` int(11) NOT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `position` varchar(10) NOT NULL,
  `status` int(11) DEFAULT 1,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_video`
--

INSERT INTO `gallery_video` (`id`, `video_link`, `position`, `status`, `Created_At`, `Updated_At`) VALUES
(3, 'https://www.youtube.com/embed/Q4biEkg7wr4?si=TqfWwhN4QQDt-Way', 'right', 1, '2024-05-21 11:42:25', '2024-05-22 05:02:31'),
(5, 'https://www.youtube.com/embed/PzvgR4mc588?si=w3vwRoA00UfHnetS', 'left', 1, '2024-05-21 11:48:50', '2024-06-10 05:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `experience` varchar(50) NOT NULL,
  `employment_type` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `short_location` varchar(255) NOT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `schedule` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `responsibilities`, `qualifications`, `category_id`, `experience`, `employment_type`, `location`, `short_location`, `salary`, `schedule`, `status`, `created_at`, `updated_at`) VALUES
(25, 'Pre Sales BDM', '<ul>\r\n	<li>Plan admission strategies in response to market and competitors&rsquo; behavior.</li>\r\n	<li>Work in sync with the counseling team and develop sustainable and commercially viable products.</li>\r\n	<li>Understand center needs and guide them properly.</li>\r\n	<li>Liaise with the counseling team and customer and undertake demand-generating activities such as increasing admission and lead generation.</li>\r\n	<li>Build lasting relationships with customer.</li>\r\n	<li>Continuously monitor and train the team to improve performance and qualification rates.</li>\r\n	<li>Counselling learning prospects, offering career advice, and providing a sense of how our programs can accelerate their career and business.</li>\r\n	<li>Maintaining a detailed database of all the interactions with the leads and providing constant feedback on the quality of the leads to the respective team.</li>\r\n	<li>Analyzing and sharing active feedback about customer behavior, market demands, and competition with the marketing team.</li>\r\n	<li>Handle escalations and improve customer experience.</li>\r\n	<li>Make propositions, give suggestions, and designate weekly sales-qualified targets and job obligations to each team member.</li>\r\n	<li>Give prompt responses on crucial issues and suggest solutions.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Solution-oriented analytical skills.</li>\r\n	<li>Ability to initiate conversations and make a lasting impact.</li>\r\n	<li>Well-versed with Excel and CRM software.</li>\r\n	<li>Time-management skills.</li>\r\n	<li>Liaisoning and interpersonal skills.</li>\r\n	<li>Verbal communication.</li>\r\n	<li>Results-driven.</li>\r\n</ul>\r\n', '', 12, '6+ Months', 'Full-time, Permanent, Fresher', 'In person (Noida, Uttar Pradesh)', 'Noida', '20,000.00 - 25,000.00 ', ' Day shift', 1, '2024-06-04 11:03:45', '2025-03-08 10:09:41'),
(26, 'SEO Executive', '<p>This is a full-time role for a Search Engine Optimization Executive. As an SEO Executive, you will be responsible for conducting keyword research, performing On-page and Off-page SEO activities, building links and conducting SEO audits. Develop and execute organic SEO strategies to improve website visibility, drive organic traffic, and increase rankings on search engines. Stay current with SEO trends, algorithm updates, and industry best practices to adapt strategies accordingly and maintain competitive advantage. Provide regular reports and insights on SEO performance, highlighting successes, challenges, and opportunities for improvement to key stakeholders</p>\r\n', '<ul>\r\n	<li>Keyword Research and Off-Page and On-Page SEO skills</li>\r\n	<li>Link Building skills</li>\r\n	<li>Experience in conducting SEO audits</li>\r\n	<li>Excellent written and verbal communication skills</li>\r\n	<li>Ability to work independently</li>\r\n</ul>\r\n', '', 11, '0-1 Year', 'Full-time, Permanent, Fresher', 'In person (Noida, Uttar Pradesh)', 'Noida', '15,000-20,000', ' Day shift', 1, '2024-06-04 11:25:09', '2025-03-08 10:16:31'),
(35, 'Senior Frontend Developer', '<p>We are hiring a senior frontend developer ho can design HTML or CSS webpages from figma or Illustrator.</p>\r\n', '<p>Develop creative webpages.</p>\r\n\r\n<p>Must have knowledge of HTML, CSS, Javascript, Github, React, Bootstrap, Tailwind or any other libraries.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>Any Graduate</p>\r\n', 11, '3+ Years', 'Regular', 'Noida sector 59', 'Noida', '-', '-', 1, '2025-03-08 10:14:19', '2025-03-08 10:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(8, 'HR', 'hr', 1, '2024-06-04 05:53:53', '2024-06-04 05:53:53'),
(11, 'IT', 'it', 1, '2024-06-04 10:24:50', '2024-06-04 10:24:50'),
(12, 'Sales', 'sales', 1, '2024-06-04 10:49:11', '2024-06-04 10:49:11'),
(13, 'Accounts', 'accounts', 1, '2024-06-04 10:50:53', '2024-06-04 10:50:53'),
(14, 'Admin', 'admin', 1, '2024-06-04 10:51:05', '2024-06-04 12:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`) VALUES
(18, 'safdar ali', 'saif@gmail.com', '9568890557', '', 'hii', '2024-05-30 05:38:04'),
(19, 'Saif Ali', 'sgvu@gmail.com', '9568890557', '', 'dfgresasdsgdfgd', '2024-05-30 05:48:52'),
(20, 'bshs shhs', 'demo@gmail.com', '123456789', '', 'gfjgj', '2024-05-30 06:27:41'),
(21, 'safdar ali', 'fjkfdjkfj@gmail.com', '585858585858585', '', 'reuireijrhjrehjrej', '2024-05-31 05:08:11'),
(22, 'sfsdfsd ali', 'dbprimusvidya@gmail.com', '745875487548754', '', 'uyweueyurywueiyeuieiu', '2024-05-31 05:08:41'),
(23, 'sfsdfsd askjasjk', 'jamia@gmail.com', '784387438732562', '', 'jhsdjhjs byugufugsdfhbh', '2024-05-31 05:09:40'),
(24, 'Deepak Singh Rawat ', 'rohan@gmail.com', '07895380082', NULL, 'sreerewrwe', '2024-06-10 06:16:03'),
(25, 'sfsdfsd dsfsdf', 'sgvuwer@gmail.com', '3243243432', NULL, 'ewrewrer', '2024-06-10 09:24:19'),
(26, 'Akshita Jairamani', 'akshitajairamani08@gmail.com', '7303420111', NULL, 'na', '2024-06-20 17:31:44'),
(27, 'AADIL  BASHIR', 'CTCDHP@GMAIL.COM', '7889775213', NULL, 'HLO GOOD MORNING SIR/MAAM I AM AADIL BASHIR ', '2024-07-12 07:29:00'),
(28, 'Rajkumar Pandey', 'edtechinnovate1@gmail.com', '9368649781', NULL, 'I need a admission management software for my college.', '2024-07-18 04:53:12'),
(29, 'Jagat Singh', 'info@singhpublicschool.com', '9870243584', NULL, 'Looking for School Management System', '2024-07-26 09:36:33'),
(30, 'Edward McCarthy', 'achabedwardmccarthy@gmail.com', '0546065120', NULL, 'i want a demo version to test before buying', '2024-08-14 08:11:47'),
(31, 'Ruhit Ahmed', 'business@coursecloud.org', '2037432362', NULL, 'Hi,\r\n\r\nI\'m Ruhit, From Course Cloud. Many businesses have successfully met their learners\' needs and increased revenue through our CPD-accredited courses.\r\n\r\nWe understand the challenges of scaling educational offerings and boosting income. Our diverse course library and flexible partnership models provide an ideal solution for creating new revenue streams while maintaining your brand’s integrity.\r\n\r\nI\'d love to discuss how our platform can support your growth. Are you available for a brief call next week?\r\n\r\nBest regards,\r\n\r\nRuhit', '2024-08-14 20:06:51'),
(32, 'Ann Parker', 'ann.parker@leadgenproductpro.com', '9142156015', NULL, 'Hi,\r\n\r\nWould you be interested in key decision-makers and educators within K12 Private, Public and Charter Schools, Colleges and Universities?\r\n\r\nTitle includes:- School/College Board Members, Superintendents, Principals, Deans, IT Administrators, Technology Directors, Director of Information and Instructional Technology, Director of IT, Associate Director of Systems, Director of Guidance & Counseling, Director of Admissions & Student Records, Student Support Specialist, Department Chairs, Educators/Professors by subject area, Supervisor of STEM Programs, Curriculum by Subject Area, Director of Early Childhood Education, Director of Elementary Educations, and many more.\r\n\r\nWe can also assist you with Moodle, Blackboard, Google Classroom, Facts, Instructure, Canvas LMS, Schoology, and more.\r\n\r\nPlease let me know your interest so that I can provide you with more information like counts and pricing details.\r\n\r\nRegards,\r\nAnn Parker\r\nMarketing Associate', '2024-08-19 16:13:52'),
(33, 'Shohidul Islam  Mondal ', 'shohidulislam372@gmail.com', '6002541581', NULL, 'I am interested ', '2024-08-23 19:01:38'),
(34, 'Surendra Singh', 'scholarszone.la@gmail.com', '9410506395', NULL, 'We want to associate with you, What option you have, pls feel free to send information.\r\n\r\nThanx', '2024-08-28 03:52:22'),
(35, 'Madison CHANDLER', 'madison@guestpostmate.com', '2032866863', NULL, '\r\nHello,\r\nI found this post and looks good https://   https://www.articlecede.com/how-does-an-admission-management-system-help-minimize-administrative-burdens/\r\n\r\n Would like to know if you need more similar guest posts? You can also forward\r\nthis to your marketing agency. They can use our database for a boost.\r\nI&#39;m a guest blogger and I can help them to find more guest blog posts on the relevant website.\r\n\r\nWe are eager to hear from you.\r\n\r\nThanks\r\nMadison Chandler\r\nWeb Site: https://www.guestpostmate.com\r\nReply with no for removal', '2024-09-09 11:02:05'),
(36, 'Geetha Palanisamy', 'geetha.vinothkannan@gmail.com', '8939902438', NULL, 'Hi, I\'m working in Iamneo company which is also online solution providers . Looking for a job in the similar field. Would like to know more about it. ', '2024-09-28 17:31:22'),
(37, 'Christy Mark', 'christy@guestpostzoomwings.com', '1114516314', NULL, 'Hello,\r\n\r\nMy name is Christy, and my web analysis shows that you are already using guest posting to build backlinks for your website.  https://www.edtechinnovate.com/ found the https://gamesbad.com/data-security-and-privacy-in-crm-best-practices-for-compliance/ .\r\n\r\nI\'m a professional Blogger and Outreach Service Provider. I would like to inform you that I also have many such types of High DA blogs and sites with better metrics and more incoming traffic. My content writing team can create excellent, quality articles related to your business and publish them with your backlinks on High DA (Domain Authority) & PA (Page Authority) blogs.\r\n\r\nWe understand your business well, as we have extensive experience in the same industry.\r\n\r\nWe provide Dofollow links to your website pages and use only ethical content marketing methods, so your website will never be affected by or penalized by new Google algorithm updates.\r\n\r\nKindly let me know if you are looking for a trustworthy Guest Posting Service / Blogger Outreach Service to grow your business online. I can provide you with end-to-end guest posting solutions.\r\n\r\nNote – If you wish first to see my list of 100+ sites and prices is right here: https://docs.google.com/spreadsheets/d/1ZhzNDaJFB5aF5t4NCHZwi-nGqWfz9GEr/\r\n\r\nCheck Out Our other list of 700+ sites, and prices are right here: https://docs.google.com/spreadsheets/d/1RloY4MhNVROUrQ19iXWRWRCpFzRZ23No/\r\n\r\nPlease get in touch, I can help your business beat the competitors.\r\n\r\nThanks & Regards\r\nChristy Mark\r\nEmail: christy@guestpostzoomwings.com\r\ninfozoomwings@gmail.com\r\nWebsite: https://www.zoomwings.com\r\nSkype: Zoom Wings\r\n\r\nP.S. We sincerely regret the inconvenience if you have received our emails multiple times. We value your privacy and company with anti-spam laws. To unsubscribe, Please reply with a \"No\" on the email subject-line.', '2024-10-22 09:45:45'),
(38, 'Christy Mark', 'christy@guestpostzoomwings.co', '1114516314', NULL, 'Hello,\r\n\r\nMy name is Christy, and my web analysis shows that you are already using guest posting to build backlinks for your website.  https://www.edtechinnovate.com/ found the https://gamesbad.com/data-security-and-privacy-in-crm-best-practices-for-compliance/ .\r\n\r\nI\'m a professional Blogger and Outreach Service Provider. I would like to inform you that I also have many such types of High DA blogs and sites with better metrics and more incoming traffic. My content writing team can create excellent, quality articles related to your business and publish them with your backlinks on High DA (Domain Authority) & PA (Page Authority) blogs.\r\n\r\nWe understand your business well, as we have extensive experience in the same industry.\r\n\r\nWe provide Dofollow links to your website pages and use only ethical content marketing methods, so your website will never be affected by or penalized by new Google algorithm updates.\r\n\r\nKindly let me know if you are looking for a trustworthy Guest Posting Service / Blogger Outreach Service to grow your business online. I can provide you with end-to-end guest posting solutions.\r\n\r\nNote – If you wish first to see my list of 100+ sites and prices is right here: https://docs.google.com/spreadsheets/d/1ZhzNDaJFB5aF5t4NCHZwi-nGqWfz9GEr/\r\n\r\nCheck Out Our other list of 700+ sites, and prices are right here: https://docs.google.com/spreadsheets/d/1RloY4MhNVROUrQ19iXWRWRCpFzRZ23No/\r\n\r\nPlease get in touch, I can help your business beat the competitors.\r\n\r\nThanks & Regards\r\nChristy Mark\r\nEmail: christy@guestpostzoomwings.com\r\ninfozoomwings@gmail.com\r\nWebsite: https://www.zoomwings.com\r\nSkype: Zoom Wings\r\n\r\nP.S. We sincerely regret the inconvenience if you have received our emails multiple times. We value your privacy and company with anti-spam laws. To unsubscribe, Please reply with a \"No\" on the email subject-line.', '2024-10-22 09:48:42'),
(39, 'terry martin', 'terry.chapman@guestpostshark.com', '2032868663', NULL, 'Hello,\r\n\r\nI wanted to reach out to invite your company to participate in our guest blogging campaign, aimed at enhancing brand visibility and driving traffic.\r\n\r\nWe offer guest posts at $30 each, placed on relevant blogs. If you\'re interested, please feel free to share this with your SEO agency for potential collaboration.\r\n\r\nWould you like to see some samples? You can visit us at .\r\n\r\nThank you for your time, and I look forward to hearing from you!\r\n\r\nThank you,\r\nTERRY\r\nhttps://www.guestpostshark.com\r\nTo opt out of our mailing list, please reply with \"no\"', '2024-10-29 04:07:58'),
(40, 'Ankit Verma', 'meankitverma01@gmail.com', '9716539766', NULL, 'Apply For the Post Of Accountant.', '2024-11-03 03:08:20'),
(41, 'SWARNA SUNIL SHETTY', 'mrsshetty2019@gmail.com', '0527220582', NULL, 'Educational loan ', '2024-11-05 10:51:31'),
(42, 'ABHIJIT SAHA', 'skillzedu@gmail.com', '8240456679', NULL, 'want to know about partnership ', '2024-11-27 05:39:31'),
(43, 'ashu jangid', 'techsupport3@sofworld.org', '9634151430', NULL, 'searching for lms developement for education', '2024-11-29 03:54:50'),
(44, 'Gary Charles', 'gary.charles@dominatingkeywords.com', '8054002077', NULL, 'I am not offering you SEO, nor PPC.\r\nIt\'s something completely different.\r\nJust send me keywords of your interest and I\'ll give you traffic guarantees on each of them.\r\nLet me demonstrate how it works and you will be surprised by the results. ', '2024-12-29 03:59:26'),
(45, 'Kulvir singh  Brar', 'kulvirbrar007@gmail.com', '7973956648', NULL, 'Hii .. I\'m looking for job ', '2025-01-04 03:11:05'),
(46, 'Gafar Fawas ', 'gafarfawas53@gmail.com', '9059744988', NULL, 'I want to create an exam portal on my mobile phone ', '2025-01-04 13:47:36'),
(47, 'Abdul Rashid  Wani ', 'millionairemindssolutions@gmail.com', '6006734724', NULL, 'I want work with you ', '2025-01-12 11:54:24'),
(48, 'QVY83XBXN0 www.google.com QVY83XBXN0 www.google.com', 'AlinaBlohina00@list.ru', '+74951373329', NULL, 'QVY83XBXN0 www.google.com', '2025-01-15 09:20:22'),
(49, 'Gary Charles', 'gary-charles@dominatingkeywords.com', '8054002077', NULL, 'I am not offering SEO or PPC services. This is something entirely different. Simply send us your desired keywords, and your website will instantly appear at the top of Google and Bing search results, without any Pay Per Click charges. Let me demonstrate how it works and you\'ll be pleasantly surprised by the results. ', '2025-01-24 23:30:03'),
(50, 'Rehman Manzoor', 'seo.rehmanmanzoor@gmail.com', '3082256571', NULL, 'Hi Dear Sir / Mam\r\n\r\nI am selling Guest Post on my websites with do-follow links and google index include content writing service. I am also providing Full SEO (On-page - Off-Page) services.\r\n\r\n Please check my websites and let me know if you have any orders for me.  \r\n\r\nHigh Quality  websites\r\n\r\n(   autistic baker . com )\r\n(   bi news . it   )\r\n( 99techpost . com )\r\n( techdogs . com  )\r\n\r\n\r\n(    cronache della campania . it )\r\n( mbnews . it   )\r\n( picenotime . it )\r\n(   mixed gals . com)\r\n\r\n\r\nIf you have any special requirements please let me know with your budget.\r\n\r\n\r\nWaiting For Your Reply\r\nThanks', '2025-02-03 07:20:19'),
(51, 'Syed Anwar', 'paul.arvind@ibeforum.com', '3475147333', NULL, 'Saudi SMART School 2025 \r\n\r\nHi Team Marketing, this is regarding the upcoming Saudi SMART School Jeddah and Saudi SMART School Dammam 2025. Do let me know if you are keen to receive additional information.\r\n', '2025-02-06 10:04:06'),
(52, 'artur trzop', 'arturtrzop908@gmail.com', '3256176272', NULL, 'Hi Sir\r\nI hope you are doing well\r\n\r\nI am a Digital Marketer\r\nWe provide paid guest posting (Content Marketing) and link insertion service\r\nWe will publish your content on high-authority websites to rank your sales customer visitors with reasonable prices\r\nExample websites :\r\nhttps://expressdigest.com/\r\nhttps://marketbusinessnews.com/\r\nhttps://www.itechpost.com/\r\nhttps://www.europeanbusinessreview.com/\r\nhttps://www.scoopearth.com/\r\nhttps://www.ottawalife.com/\r\nPlease let us know if you work with us', '2025-02-06 15:11:57'),
(53, 'tamim Jorden Jorden', 'tamimjorden@gmail.com', '3011446665', NULL, 'Hi\r\nSir/mam\r\nDo you want to publish your article on a high domain\r\nauthority website for a cheap price? \r\nThen we are here we will publish your article with do follow backlink just at reasonable prices,\r\nwe are accepting every category only adult is not allowed\r\nCBD and Casino also accepting\r\n\r\nTAT we will publish your article within 24 hour\r\n\r\nThe article must be unique and a minimum of 800 words required\r\n\r\nSites	DA	PA	Domain Rating	Backlinks	Traffic	Niche\r\nhttps://facts.net/	62	40	73	115K	2.00M	Health/Tech/Celebrity/Sports/Biology/General\r\nhttps://www.foxla.com/	88	70	78	390K	1.88M	News/Sports/Social/Local\r\nhttps://www.caclubindia.com/	54	55	58	83K	1.34M	News\'Live classes\'Experts\r\nhttps://www.caclubindia.com/wealth	54	33	58	83K	1.34M	Politices Shark tank Television\r\nhttp://beforeitsnews.com	75	64	76	3.3M	364K	Health;Economy;beyond\r\nhttps://theinc.home.blog	91	41	86	4	168K	Technology;Health;Business\r\nhttps://fastestvpn.com/	49	56	68	247K	158K	Vpn Software;Gaming Vpn/All vpn\r\nhttps://plagiarismdetector.net/	43	55	68	39K	291K	Plagiarism checker;Plagiarism tools\r\nhttps://storiesdown.com/	43	49	58	5.8K	215K	Stories Viewer/Video Down/Social\r\nhttps://whatsmind.com/	51	43	48	2.0K	173K	Health Tech Business News Trending\r\nhttps://www.strategyfinders.com/	57	24	26	1.0K	95.7K	Social media Tech Guides General\r\nhttps://iemlabs.com/	58	51	81	25K	76.4K	Tech\'Busines\'Health\'Markithing\'Terending\r\nhttps://www.bloghalt.com/	55	41	30	3.0K	74.1K	Tech Business Health Education\r\nhttps://iemlabs.com/	58	51	81	24K	73.4K	News\'Blog\'Syber Security\r\nhttps://www.onlinethreatalerts.com	54	51	49	46K	45.4K	Trending now;Social adds\r\n', '2025-02-07 17:47:54'),
(54, 'zumi zumi', 'zumihoshiseo@gmail.com', '3281850326', NULL, 'Hi there,\r\n\r\nI hope you\'re doing well! I\'m reaching out to introduce our service focused on guest posting and link insertion.\r\n\r\nWe specialize in helping websites like yours by providing engaging guest posts with relevant links. Our goal is to make the process easy and effective for you.\r\n\r\nBelow is the sites list for Guest Posting and Link insertion.\r\n\r\nSite..1: https://ecomuch.com/\r\n\r\nSite..2: https://psychtimes.com/                 \r\n\r\nSite..3:  https://livepositively.com/                          \r\n\r\nSite..4:  https://yearlymagazine.com/                 \r\n\r\nSite..5:  https://mysterioushub.co.uk/         \r\n\r\nIf you\'re interested in learning more about how we can work together to enhance your site, let\'s chat!\r\n\r\nBest regards,', '2025-02-10 06:24:56'),
(55, 'Rinki  Rinki', 'sachingotam54@gmail.com', '9580871671', NULL, 'Iske bare me samjhaye', '2025-02-13 14:57:28'),
(56, 'Ansari Eram Kafeel Ahmad', 'ansarieramkafeel@gmail.com', '7040139108', NULL, 'Dear Hiring Manager,\r\n\r\nI came across your post and would love to connect! I am a freelance content writer with four years of experience specializing in Healthcare, Ed-Tech, IT, AI, Travel, and Technology. My expertise includes creating SEO-optimized, engaging, and well-researched content that helps businesses establish authority and improve their online presence.\r\n\r\nI’d be happy to discuss your content needs and how I can contribute to your projects. Looking forward to hearing more details!\r\n\r\nBest regards,\r\nEram Kafeel\r\nansarieramkafeel@gmail.com\r\n7040139108\r\nhttps://www.visitsvisa.com/blog/  \r\nhttps://www.cssfounder.com/blogs/\r\nhttps://techatronic.com\r\nhttps://weplugins.com/shop/ \r\n\r\n\r\n', '2025-02-23 15:18:36'),
(57, 'Aniebiet Ekanem', 'aniebiet4mike@gmail.com', '7088204192', NULL, 'Wants to create online test', '2025-03-11 16:30:27'),
(58, 'Sujeet Kumar', 'sujeetji922@gmail.com', '6393050682', NULL, 'B voc MLT ', '2025-03-21 09:17:40'),
(59, 'Nitin Manral', 'nitinmanraal2002@gmail.com', '7011642177', NULL, 'Hello, I\'m facing an issue while applying for the role of SEO Executive role on the Careers page. The \"Apply Now\" CTA is non-responsive. Thank you. ', '2025-03-21 13:44:17'),
(60, 'Amrutha Varshini', 'support@quriobytes.com', '7619185724', NULL, 'We are looking for a LMS where we can manage student portal and mentors and operation team portal.\r\n', '2025-04-10 21:08:17'),
(61, 'KAYAPATI RAJAGOPAL', 'drkayapatirajagopal@gmail.com', '9676292629', NULL, ' i  want  publish articles / journals   in scopus / web of science etc.,  pls provide  contact number', '2025-04-13 15:10:35'),
(62, 'Amit M', 'amit@gmail.com', '123456', NULL, 'sdfsdf', '2025-04-23 07:41:13'),
(63, 'ARIF HUSSAIN LONE', 'ariflone73@gmail.com', '9871541517', NULL, 'HI ,i am looking for a job change with good growth options and hike on my existing annual  CTC package.', '2025-05-03 13:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `plan_id` varchar(50) NOT NULL,
  `plan_name` varchar(255) NOT NULL,
  `plan_price` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `status` enum('pending','paid','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `plan_id`, `plan_name`, `plan_price`, `name`, `email`, `number`, `address`, `status`, `created_at`) VALUES
(65, '3', 'Premium', 1.00, 'test1223123', 'texst@gmail.com', '02311232132', 'xaxsax', 'failed', '2025-09-18 06:34:50'),
(66, '3', 'Premium', 1.00, 'test12231235', 'tex4st@gmail.com', '02711232132', 'xaxsax', 'paid', '2025-09-18 06:35:31'),
(67, '3', 'Premium', 1.00, 'utytrewqwert', '7654324wwer@gmail.com', '543234233244', 'hrewqreweghewqergewer', 'pending', '2025-09-18 07:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('initiated','success','failed') DEFAULT 'initiated',
  `easebuzz_payment_id` varchar(100) DEFAULT NULL,
  `easebuzz_response` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `txn_id`, `amount`, `status`, `easebuzz_payment_id`, `easebuzz_response`, `created_at`, `updated_at`) VALUES
(16, 65, 'TXN651758177290', 1.00, 'failed', 'E2509180MKC1Y3', '{\"status\": 1, \"data\": \"2d32384bd1312127987c594228607d37fab2cb39fb3b642d3cfe85a685b0c9a8\"}', '2025-09-18 06:34:51', '2025-09-18 06:34:59'),
(17, 66, 'TXN661758177331', 1.00, 'success', 'E2509180MKC3BS', '{\"status\": 1, \"data\": \"2c895b38c8c00ee783c7dc3855ce5068a2008fee919f942fad45d0f428f0d838\"}', '2025-09-18 06:35:32', '2025-09-18 06:36:00'),
(18, 67, 'TXN671758179003', 1.00, '', NULL, '{\"status\": 1, \"data\": \"5571bf9695a1114eecad57ff3582ec5b09714ea356f4cdbb5adc85ed3c36ef66\"}', '2025-09-18 07:03:24', '2025-09-18 07:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `plains`
--

CREATE TABLE `plains` (
  `id` int(255) NOT NULL,
  `plains_category_id` int(255) NOT NULL,
  `actual_price` varchar(255) NOT NULL,
  `discout_price` varchar(255) NOT NULL,
  `key_features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`key_features`)),
  `plain_type` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plains`
--

INSERT INTO `plains` (`id`, `plains_category_id`, `actual_price`, `discout_price`, `key_features`, `plain_type`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, '2121', '12121', '[{\"feature\":\"xasawwe\",\"status\":1},{\"feature\":\"xasawwe\",\"status\":0}]', 'yearly', '1', '2025-09-11 10:26:53', '2025-09-11 11:52:20'),
(3, 1, '1300', '1', '[{\"feature\":\"Live chat widget for website\",\"status\":1},{\"feature\":\"All basic CRM features\",\"status\":1},{\"feature\":\"Additional staff accounts\",\"status\":1},{\"feature\":\"24/7 email and chat support\",\"status\":0},{\"feature\":\"Organizational admin\",\"status\":0}]', 'months', '1', '2025-09-11 11:40:13', '2025-09-17 12:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `plains_category`
--

CREATE TABLE `plains_category` (
  `id` int(11) NOT NULL,
  `products_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plains_category`
--

INSERT INTO `plains_category` (`id`, `products_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Premium', 1, '2025-09-09 12:45:25', '2025-09-11 11:51:16'),
(2, 3, 'Standard', 1, '2025-09-11 10:03:20', '2025-09-11 11:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `status`, `created_at`, `update_at`) VALUES
(3, 'CRM', 1, '2025-09-11 12:32:32', '2025-09-12 05:24:29'),
(6, 'LMS', 1, '2025-09-12 04:57:20', '2025-09-12 05:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_service`
--

CREATE TABLE `testimonial_service` (
  `id` int(255) NOT NULL,
  `products_id` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_service`
--

INSERT INTO `testimonial_service` (`id`, `products_id`, `name`, `title`, `message`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 'xsxas', 'ewqweqwe', '<p>We\'ve been using CRM management for months now, and the results speak for themselves. Our sales pipeline visibility has improved. We\'ve been using CRM management for months now, and the results speak for themselves. Our sales pipeline visibility has improved.</p>\n', '/admin/admin-assets/img/testimonial_service/1757408706.png', '1', '2025-09-09 09:05:05', '2025-09-09 09:50:30'),
(8, 3, 'XSXSXSA', 'weqesaaqwewq', '<p>We&#39;ve been using CRM management for months now, and the results speak for themselves. Our sales pipeline</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n ', '/admin/admin-assets/img/testimonial_service/1757411942.png', '1', '2025-09-09 09:59:01', '2025-09-09 10:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Short_Name` varchar(191) DEFAULT NULL,
  `Contact_Name` varchar(191) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Alternate_Email` varchar(50) DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT NULL,
  `Alternate_Mobile` varchar(100) DEFAULT NULL,
  `Designation` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Password` blob NOT NULL,
  `Address` text DEFAULT NULL,
  `Pincode` varchar(60) DEFAULT NULL,
  `State` varchar(40) DEFAULT NULL,
  `City` varchar(40) DEFAULT NULL,
  `District` varchar(40) DEFAULT NULL,
  `Photo` varchar(100) NOT NULL,
  `Is_Unique` tinyint(4) NOT NULL DEFAULT 0,
  `IsFirstLogin` tinyint(4) NOT NULL DEFAULT 1,
  `B2B_Partner` tinyint(1) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `Created_By` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Country_ID` int(255) DEFAULT NULL,
  `Auth_Center_Type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Code`, `Name`, `Short_Name`, `Contact_Name`, `Email`, `Alternate_Email`, `Mobile`, `Alternate_Mobile`, `Designation`, `Role`, `Password`, `Address`, `Pincode`, `State`, `City`, `District`, `Photo`, `Is_Unique`, `IsFirstLogin`, `B2B_Partner`, `Status`, `Created_By`, `Created_At`, `Updated_On`, `Country_ID`, `Auth_Center_Type`) VALUES
(1, 'EDTECH', 'Admin', 'Admin', NULL, 'admin@ccvte.com', NULL, '9569143541', NULL, 'Administartor', 'Administrator', 0xfcf79e91fa3c6f1da779ef96beea688d, NULL, NULL, NULL, NULL, NULL, '/admin-assets/img/default-user.png\r\n', 0, 1, 0, 1, 1, '2024-03-09 07:28:28', '2024-03-09 07:28:28', NULL, NULL),
(29, '', 'Black Diamond Public School  wq', NULL, 'Rajeev Kumar', 'RajeevKumar@gmail.com', NULL, '6787837879', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '221718', 'Uttar Pradesh', 'RUPWAR BHAGWANPUR', 'BALLIA', '', 0, 1, NULL, 1, 0, '2024-04-05 07:56:20', '2024-04-05 07:56:20', NULL, NULL),
(30, '', 'Black Diamond Public School', NULL, 'anuj', 'anuj@gmail.com', NULL, '6787837873', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '201301', 'Uttar Pradesh', 'NOIDA SECTOR 27', 'GAUTAM BUDDHA NAGAR', '', 0, 1, NULL, 1, 0, '2024-04-05 11:53:42', '2024-04-05 11:53:42', NULL, 0),
(31, '', 'anujer', NULL, 'anujrr', 'anue@gmail.com', NULL, '4746768444', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '221718', 'Uttar Pradesh', 'RUPWAR BHAGWANPUR', 'BALLIA', '', 0, 1, NULL, 1, 0, '2024-04-08 05:23:57', '2024-04-08 05:23:57', 1, 1),
(32, '', 'anuj', NULL, 'anuj', 'anujddddd@gmail.com', NULL, '4555555555', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '221718', 'Uttar Pradesh', 'RUPWAR BHAGWANPUR', 'BALLIA', '', 0, 1, NULL, 1, 0, '2024-04-08 05:31:23', '2024-04-08 05:31:23', 12, 1),
(33, '', 'anuj', NULL, 'anuj', 'anujddddd@gmail.com', NULL, '4555555555', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '221718', 'Uttar Pradesh', 'RUPWAR BHAGWANPUR', 'BALLIA', '', 0, 1, NULL, 1, 0, '2024-04-08 05:32:06', '2024-04-08 05:32:06', 12, 1),
(34, '', 'Nitya Information Technology', NULL, 'Nitya Singh', 'nitya@gmail.com', NULL, '7634738637', NULL, 'Center', 'Center', '', 'US, 1283', '', '', '', '', '', 0, 1, NULL, 1, 0, '2024-04-08 05:43:20', '2024-04-08 05:43:20', 4, 1),
(35, '', 'API Information Technology', NULL, 'Nitya Singh', 'nitya@gmail.com', NULL, '7634738637', NULL, 'Center', 'Center', '', 'US, 1283', '', '', '', '', '', 0, 1, NULL, 1, 0, '2024-04-08 05:43:21', '2024-04-08 05:43:21', 4, 1),
(36, '', 'New Center', NULL, 'anuj', 'anuj@gmail.com', NULL, '7653783777', NULL, 'Center', 'Center', '', 'Noida', '201301', 'Uttar Pradesh', 'NOIDA SECTOR 27', 'GAUTAM BUDDHA NAGAR', '', 0, 1, NULL, 1, 0, '2024-04-08 05:46:44', '2024-04-08 05:46:44', 16, 0),
(37, '', 'MIYJHSKJ SDGHJJW HQUY ', NULL, 'anuj', 'anuj@gmail.com', NULL, '7653783777', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '', '', '', '', '', 0, 1, NULL, 1, 0, '2024-04-08 05:47:51', '2024-04-08 05:47:51', 16, 1),
(38, '', 'MIYJHSKJ SDGHJJW HQUY ', NULL, 'anuj', 'anuj@gmail.com', NULL, '7653783777', NULL, 'Center', 'Center', '', '', '201304', 'Uttar Pradesh', 'CHHAPRAULI BENGAR', 'GAUTAM BUDDHA NAGAR', '', 0, 1, NULL, 1, 0, '2024-04-08 05:49:57', '2024-04-08 05:49:57', 16, 0),
(39, '', 'asddd sihh', NULL, 'Mishra', 'asddd@gmail.com', NULL, '2432544444', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '221718', 'Uttar Pradesh', 'RUPWAR BHAGWANPUR', 'BALLIA', '', 0, 1, NULL, 1, 0, '2024-04-08 05:50:47', '2024-04-08 05:50:47', 16, 0),
(40, '', 'bbbbbbbbbbbbbb', NULL, 'EWE', 'anuj@gmail.com', NULL, '7653783777', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '221718', 'Uttar Pradesh', 'RUPWAR BHAGWANPUR', 'BALLIA', '', 0, 1, NULL, 1, 0, '2024-04-08 05:51:55', '2024-04-08 05:51:55', 109, 1),
(41, '', 'abc', NULL, 'anuj', 'anuj@gmail.com', NULL, '7653783777', NULL, 'Center', 'Center', '', 'Gaziabad, UP', '221718', 'Uttar Pradesh', 'RUPWAR BHAGWANPUR', 'BALLIA', '', 0, 1, NULL, 1, 0, '2024-04-08 05:58:44', '2024-04-08 05:58:44', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `who_we_serve`
--

CREATE TABLE `who_we_serve` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `who_we_serve`
--

INSERT INTO `who_we_serve` (`id`, `client_name`, `description`, `photo`, `link_url`, `status`, `created_At`, `updated_At`) VALUES
(9, 'IITS', '<p>IITS works with 78 educational institutions and 17 Indian universities. As the country&#39;s biggest EduTech company, IITS overseas the University&#39;s web portals to communicate between academic institutions and students</p>\r\n\r\n<p>&nbsp;</p>\r\n', '/admin-assets/img/WhoWeServe/1717145116.png', 'https://iitseducation.in', 1, '2024-05-31 08:45:16', '2024-06-10 10:38:06'),
(10, 'Jamia Urdu Aligarh', '<p>Jamia Urdu Aligarh is a prominent institution known for distance education in our country. The institution is known for its commendable work in the promotion of the Urdu language as well as offering quality school education.</p>\r\n', '/admin-assets/img/WhoWeServe/1717150289.png', 'https://juaonline.in/', 1, '2024-05-31 10:09:38', '2024-05-31 10:11:28'),
(11, 'Glocal School of Vocational Studies/Glocal University', '<p>Glocal School of Vocational Studies provides various UGC-certified, flexible, and affordable vocational training and skill development courses to enhance the employability and entrepreneurship skills of the students.</p>\r\n', '/admin-assets/img/WhoWeServe/1717150550.webp', 'https://vocational.glocaluniversity.edu.in/', 1, '2024-05-31 10:14:36', '2024-05-31 10:58:34'),
(12, 'Om Sterling Global University (OSGU)', '<p>Om Sterling Global University is a Hisar, Haryana-based university that offers various courses at undergraduate and postgraduate levels, including vocational training and skill development programs. All these courses are UGC-approved.</p>\r\n', '/admin-assets/img/WhoWeServe/1717153198.webp', 'https://bvoc.osgu.co.in/', 1, '2024-05-31 10:59:58', '2024-05-31 10:59:58'),
(13, 'Shri Venkateshwara University (SVU)', '<p>Shri Venkateshwara University (SVU) is a private university located in Gajraula, Uttar Pradesh that was established as a venture of the Venkateshwara Group of Institutions. SVU offers various courses at undergraduate and postgraduate levels, including&nbsp; &nbsp;vocational programs.</p>\r\n', '/admin-assets/img/WhoWeServe/1717153959.jpg', '', 1, '2024-05-31 11:12:39', '2024-06-10 10:40:36'),
(14, 'Swayam Vidya', '<p>SvyamVidya deals in the B2B segment by partnering with various renowned universities and other institutions such as schools and coaching centers to facilitate student admissions to university courses and assist in every step involved in the process.</p>\r\n', '/admin-assets/img/WhoWeServe/1717154068.png', '', 1, '2024-05-31 11:14:27', '2024-05-31 11:14:27'),
(15, 'Principle Institute of Management', '<p>Principle Institute of Management is a renowned institution located in Calicut exclusively to support students to complete their courses via credit transfer in a time-bound and hassle-free manner.</p>\r\n', '/admin-assets/img/WhoWeServe/1717392614.png', 'https://principleinstitution.com/', 1, '2024-05-31 11:57:33', '2024-06-03 05:30:14'),
(16, 'Brilliance Attestation', '<p>Brilliance Attestation provides Certificate attestation services on educational, non-educational, and commercial documents in a secure and trustworthy manner. In addition, the organization provides other services such as document translation, notarization, and embassy legalization.</p>\r\n', '/admin-assets/img/WhoWeServe/1717393314.jpg', 'https://theattestation.in/', 1, '2024-05-31 11:59:51', '2024-06-03 05:41:53'),
(17, 'CCVTE', '<p>The Centre Council for Vocational Training and Skill Education (CCVTE) offers multiple skill development courses in various domains to provide the best opportunities for the public to improve their skills.</p>\r\n', '/admin-assets/img/WhoWeServe/1717156875.png', 'https://ccvte.org/', 1, '2024-05-31 12:01:14', '2024-05-31 12:01:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogfaq`
--
ALTER TABLE `blogfaq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogfaq_service`
--
ALTER TABLE `blogfaq_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_id` (`blogs_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blogsfaq`
--
ALTER TABLE `blogsfaq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs` (`blog_id`);

--
-- Indexes for table `blogs_service`
--
ALTER TABLE `blogs_service`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Products_ID` (`Products_ID`);

--
-- Indexes for table `clients_logos`
--
ALTER TABLE `clients_logos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products` (`products_id`);

--
-- Indexes for table `faq_service`
--
ALTER TABLE `faq_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productsId` (`products_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_image_ibfk_1` (`gallery_id`);

--
-- Indexes for table `gallery_video`
--
ALTER TABLE `gallery_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_ibfk_1` (`category_id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `plains`
--
ALTER TABLE `plains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plains_category_id` (`plains_category_id`);

--
-- Indexes for table `plains_category`
--
ALTER TABLE `plains_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_service`
--
ALTER TABLE `testimonial_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`products_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `who_we_serve`
--
ALTER TABLE `who_we_serve`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogfaq`
--
ALTER TABLE `blogfaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogfaq_service`
--
ALTER TABLE `blogfaq_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blogsfaq`
--
ALTER TABLE `blogsfaq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `blogs_service`
--
ALTER TABLE `blogs_service`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients_logos`
--
ALTER TABLE `clients_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `faq_service`
--
ALTER TABLE `faq_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `gallery_video`
--
ALTER TABLE `gallery_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `plains`
--
ALTER TABLE `plains`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plains_category`
--
ALTER TABLE `plains_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonial_service`
--
ALTER TABLE `testimonial_service`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `who_we_serve`
--
ALTER TABLE `who_we_serve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogfaq_service`
--
ALTER TABLE `blogfaq_service`
  ADD CONSTRAINT `blogfaq_service_ibfk_1` FOREIGN KEY (`blogs_id`) REFERENCES `blogs_service` (`ID`);

--
-- Constraints for table `blogsfaq`
--
ALTER TABLE `blogsfaq`
  ADD CONSTRAINT `fk_blogsfaq_blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `blogs_service`
--
ALTER TABLE `blogs_service`
  ADD CONSTRAINT `blogs_service_ibfk_1` FOREIGN KEY (`Products_ID`) REFERENCES `products` (`id`);

--
-- Constraints for table `clients_logos`
--
ALTER TABLE `clients_logos`
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `faq_service`
--
ALTER TABLE `faq_service`
  ADD CONSTRAINT `productsId` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD CONSTRAINT `gallery_image_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `plains`
--
ALTER TABLE `plains`
  ADD CONSTRAINT `plains_category_id` FOREIGN KEY (`plains_category_id`) REFERENCES `plains_category` (`id`);

--
-- Constraints for table `plains_category`
--
ALTER TABLE `plains_category`
  ADD CONSTRAINT `products_id` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `testimonial_service`
--
ALTER TABLE `testimonial_service`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
