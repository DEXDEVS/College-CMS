
<h1 align="center">IC - Institute on Cloud</h1>

Institute on Cloud is a web-based application, which not only manages every sector of an educational institute but also provides a Standardized Business Model. Whether a school or college; even a university; its spectrum encapsulates all. This application is developed using PHP framework and JavaScript technologies. The honor for developing this robust and mature management system and business model goes to Dexterous Developers. The building blocks of this application are:

1) Student Registration System <br />
2)Online Admission System <br />
3)Session; Course; Section Management <br />
4)Employee Management <br />
5)Fee Management <br />
6)Payroll Management <br />
7)SMS/Email Alert System <br />
8)Attendance Management System <br />
9)Online Web Portal for Students, Parents, Teachers <br />
10)Web Portal for Executive; Portraying Balance Sheet (for individual, as well as, collective branches). <br />
11)Mobile Application having limited features of this management system (Mostly Views). <br />
12)Accounting System <br />
13)Time Table Management <br />
14)Library Management <br />
15)Transportation Management <br />
16)Examination Management <br />



DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
