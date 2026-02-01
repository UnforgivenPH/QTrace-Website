# 🏗️ QTrace - Government Project Transparency Platform

> **A comprehensive transparency and monitoring platform empowering citizens to track Quezon City government projects in real-time**

![Platform Overview](https://img.shields.io/badge/Version-1.0-blue?style=flat-square)
![Status](https://img.shields.io/badge/Status-Active-brightgreen?style=flat-square)
![Tech Stack](https://img.shields.io/badge/Built%20With-PHP%20%7C%20MySQL%20%7C%20Bootstrap-important?style=flat-square)

---

## 📋 About QTrace

QTrace is a **revolutionary transparency platform** that bridges the gap between government and citizens. It provides:

- 🔐 **Secure Admin Portal** for managing projects, reports, articles, contractors, and audit logs
- 👥 **Public-Facing Portal** for citizens to explore projects and engage with their government
- 📊 **Real-time Analytics** with interactive dashboards and data visualization
- 🗺️ **Interactive Maps** showing project locations and progress

---

## 🚀 How It Works

### 1️⃣ Data Management (Admin)

```
Admins log in → Create/Update data → System records changes → Audit logs track accountability
```

- Secure authentication with QC ID and password
- Create and manage projects, contractors, articles, and reports
- Comprehensive audit trail 
- Full control over content visibility and status

### 2️⃣ Public Access (Citizens)

```
Citizens browse → Explore projects → View updates → Submit reports
```

- Discover ongoing government projects
- Access project documents, galleries, and updates
- Track project progress on interactive maps
- Submit feedback and concerns through reports

### 3️⃣ Data Flow

```
MySQL Database ↔ Controllers (Backend Logic) ↔ Views (User Interface)
```

- MySQL database stores all project, user, contractor, and report data
- Controllers in `/database/controllers/` handle queries and business logic
- Views render dynamic content for both admin and public interfaces

---

## ✨ Key Features

### 🎯 Admin Features

| Feature                     | Description                                                             |
| --------------------------- | ----------------------------------------------------------------------- |
| 📊 **Analytics Dashboard**  | KPIs, charts, and system overview at a glance                           |
| 🔧 **Full CRUD Management** | Create, read, update, delete projects, contractors, articles & accounts |
| 📋 **Report Moderation**    | Review and respond to citizen reports with status updates               |
| 📜 **Audit Trails**         | Track all changes with diff view                   |
| 🗺️ **Project Map**          | Visualize project locations with filterable markers                     |
| 👤 **User Management**      | Control admin accounts, roles, and permissions                          |

### 🌍 Public Features

| Feature                     | Description                                        |
| --------------------------- | -------------------------------------------------- |
| 🔍 **Project Directory**    | Search and filter projects with pagination         |
| 📰 **News & Updates**       | Latest articles and featured project news          |
| 👷 **Contractor Directory** | Browse certified contractors with ratings          |
| 📖 **Project Details**      | Full information including documents and galleries |
| 💬 **Community Reports**    | Submit and track project-related concerns          |
| 📍 **Interactive Map**      | Visualize all projects and their status            |
| 🔓 **Transparency Logs**    | Public audit trail for complete accountability     |

## 🗺️ Platform Architecture

```
📱 QTrace Platform
│
├─ 🔐 Authentication Layer
│  └─ Secure Admin Login Portal
│
├─ 👨‍💼 Admin Dashboard
│  ├─ 📊 Analytics & Reports
│  ├─ 👥 Account Management
│  ├─ 🏗️ Projects Management
│  ├─ 📰 Articles Management
│  ├─ 👷 Contractors Management
│  ├─ 💬 Reports & Feedback
│  ├─ 📜 Audit Logs
│
└─ 🌐 Public Portal
   ├─ 🏠 Home & Featured Content
   ├─ 🏗️ Projects Directory
   ├─ 📰 News & Articles
   ├─ 👷 Contractor Directory
   ├─ 💬 Report Submissions
   └─ 📍 Interactive Project Map
```

---

## 📁 Complete Sitemap System

```
QTrace
├── Authentication
│   └── Login (pages/admin/login.php)
│       └── Admin login page with QC ID and password authentication
│
├── Admin Panel
│   ├── Dashboard (pages/admin/dashboard.php)
│   │   └── Admin analytics dashboard with KPIs, charts, and system overview
│   │
│   ├── Accounts Management
│   │   ├── Accounts List (pages/admin/list_account.php)
│   │   │   └── Display all user accounts with status and actions
│   │   ├── Add Account (pages/admin/add_account.php)
│   │   │   └── Form to create new admin/user accounts
│   │   ├── Edit Account (pages/admin/edit_account.php)
│   │   │   └── Form to update account details and roles
│   │   └── View Account (pages/admin/view_account.php)
│   │       └── Detailed account information and activity history
│   │
│   ├── Projects Management
│   │   ├── Projects List (pages/admin/list_project.php)
│   │   │   └── Display all projects with status, budget, and progress
│   │   ├── Add Project (pages/admin/add_project.php)
│   │   │   └── Form to create new government projects
│   │   ├── Edit Project (pages/admin/edit_project.php)
│   │   │   └── Form to update project details, dates, and budget
│   │   ├── View Project (pages/admin/view_project.php)
│   │   │   └── Detailed project information with documents and gallery
│   │   └── Project Map (pages/admin/project_map.php)
│   │       └── Interactive map showing project locations and statuses
│   │
│   ├── Articles Management
│   │   ├── Articles List (pages/admin/list_article.php)
│   │   │   └── Display all published and draft articles
│   │   ├── Add Article (pages/admin/add_article.php)
│   │   │   └── Form to create news and update articles
│   │   ├── Edit Article (pages/admin/edit_article.php)
│   │   │   └── Form to modify article content and metadata
│   │   └── View Article (pages/admin/view_article.php)
│   │       └── Preview article with comments and engagement stats
│   │
│   ├── Contractors Management
│   │   ├── Contractors List (pages/admin/list_contractor.php)
│   │   │   └── Display all contractors with certification and ratings
│   │   ├── Add Contractor (pages/admin/add_contractor.php)
│   │   │   └── Form to register new contractors
│   │   ├── Edit Contractor (pages/admin/edit_contractor.php)
│   │   │   └── Form to update contractor information
│   │   └── View Contractor (pages/admin/view_contractor.php)
│   │       └── Detailed contractor profile and project history
│   │
│   ├── Reports Management
│   │   ├── Reports List (pages/admin/list_reports.php)
│   │   │   └── Display all citizen reports with status and priority
│   │   └── View Report (pages/admin/view_report.php)
│   │       └── Detailed report with images, comments, and response history
│   │
│   ├── Audit Logs (pages/admin/list_audit.php)
│   │   └── View system activity log with diff view and undo options
│   │
│   └── Settings
│       └── Admin Settings (pages/admin/customize.php)
│           └── System configuration and theme customization
│
└── Public Portal
    ├── Home (index.php)
    │   └── Landing page with featured projects, articles, and CTAs
    │
    ├── Projects
    │   ├── Projects List (pages/public/list_project.php)
    │   │   └── Browsable project directory with filters and pagination
    │   ├── Project Details (pages/public/view_project.php)
    │   │   └── Detailed project info with documents, gallery, and reports
    │   ├── Project Map (pages/public/project_map.php)
    │   │   └── Interactive map with filterable project markers
    │   └── Project Audit (pages/public/audit_list.php)
    │       └── Public audit log for project transparency
    │
    ├── Articles
    │   ├── Articles List (pages/public/list_article.php)
    │   │   └── News and updates with search and category filters
    │   └── Article Details (pages/public/view_article.php)
    │       └── Full article content with related articles
    │
    ├── Contractors
    │   ├── Contractors List (pages/public/list_contractor.php)
    │   │   └── Directory of certified contractors with ratings
    │   └── Contractor Details (pages/public/view_contractor.php)
    │       └── Contractor profile with certifications and projects
    │
    └── Reports
        ├── Submit Report (pages/public/add_report.php)
        │   └── Form for citizens to report project issues
        └── View Reports (pages/public/get_all_reports.php)
            └── List of all community reports with statuses
```

## 📖 Page & Feature Details

### 🔐 Authentication

| Page      | Purpose                                                                      |
| --------- | ---------------------------------------------------------------------------- |
| **Login** | Secure admin authentication using QC ID and password with session management |

---

### 👨‍💼 Admin Panel

#### 📊 Dashboard

- **Dashboard**: Comprehensive overview of system statistics with KPIs, charts, active projects count, pending reports, and recent activities

#### 👥 Accounts Management

| Page              | Functionality                                                                                |
| ----------------- | -------------------------------------------------------------------------------------------- |
| **List Accounts** | Table view of all user accounts with role, status, and action buttons (edit/delete/activate) |
| **Add Account**   | Form to create new accounts with email, password, and role assignment                        |
| **Edit Account**  | Form to modify account details, change roles, enable/disable access                          |
| **View Account**  | Detailed profile with login history, assigned projects, and activity logs                    |

#### 🏗️ Projects Management

| Page              | Functionality                                                                      |
| ----------------- | ---------------------------------------------------------------------------------- |
| **List Projects** | Table with all projects, status indicators, budget info, and progress bars         |
| **Add Project**   | Comprehensive form with location mapping, document uploads, budget allocation      |
| **Edit Project**  | Update project details, timeline, budget, attachments, and status                  |
| **View Project**  | Full project details including documents, gallery, linked contractors, and reports |
| **Project Map**   | Interactive map showing all project locations with filterable markers              |

#### 📰 Articles Management

| Page              | Functionality                                                                 |
| ----------------- | ----------------------------------------------------------------------------- |
| **List Articles** | Display published and draft articles with author, date, and visibility status |
| **Add Article**   | Rich text editor for creating news updates and articles                       |
| **Edit Article**  | Modify article content, featured image, and publication settings              |
| **View Article**  | Article preview with metadata, related articles, and engagement stats         |

#### 👷 Contractors Management

| Page                 | Functionality                                                                  |
| -------------------- | ------------------------------------------------------------------------------ |
| **List Contractors** | Contractor directory with ratings, certifications, and active status           |
| **Add Contractor**   | Registration form with company info, certifications, contact details           |
| **Edit Contractor**  | Update contractor information and certification status                         |
| **View Contractor**  | Detailed profile with certifications, projects completed, ratings, and reviews |

#### 💬 Reports Management

| Page             | Functionality                                                                             |
| ---------------- | ----------------------------------------------------------------------------------------- |
| **List Reports** | All citizen-submitted reports with status (pending/in-progress/resolved), priority levels |
| **View Report**  | Report details with images, description, chat history, and response options               |

#### 📜 Audit Logs

- **Audit List**: System activity log showing what changed, who changed it, when, with undo functionality

#### ⚙️ System Settings

- **Customize**: Admin settings for system configuration and theme customization

---

### 🌐 Public Portal

#### 🏠 Home

- **Landing Page**: Introduction to QTrace with featured projects, latest articles, contractor highlights, and call-to-action buttons

#### 🏗️ Projects

| Page                | Functionality                                                                                                         |
| ------------------- | --------------------------------------------------------------------------------------------------------------------- |
| **Projects List**   | Searchable and filterable project directory with status badges and quick stats                                        |
| **Project Details** | Complete project information including description, documents, photo gallery, linked contractors, and citizen reports |
| **Project Map**     | Interactive map visualization of all ongoing projects with location markers                                           |
| **Project Audit**   | Public view of project changes and audit trail for transparency                                                       |

#### 📰 Articles

| Page                | Functionality                                                                |
| ------------------- | ---------------------------------------------------------------------------- |
| **Articles List**   | News and updates with category filters, search functionality, and pagination |
| **Article Details** | Full article content with publish date, author info, and related articles    |

#### 👷 Contractors

| Page                   | Functionality                                                                        |
| ---------------------- | ------------------------------------------------------------------------------------ |
| **Contractors List**   | Public directory of government-approved contractors with ratings and specializations |
| **Contractor Details** | Contractor profile including certifications, completed projects, and client reviews  |

#### 💬 Reports

| Page              | Functionality                                                                      |
| ----------------- | ---------------------------------------------------------------------------------- |
| **Submit Report** | Citizen form to report project issues, delays, or concerns with photo upload       |
| **Reports List**  | Public list of all submitted reports with status tracking and response information |

---

## 📚 Technical Stack

<div align="center">

| Category            | Technology              |
| ------------------- | ----------------------- |
| 🔙 **Backend**      | PHP 7.x+                |
| 🗄️ **Database**     | MySQL/MariaDB           |
| 🎨 **Frontend**     | HTML5, CSS3, JavaScript |
| 📦 **UI Framework** | Bootstrap 5             |
| 📊 **Charts**       | Chart.js                |
| 🗺️ **Maps**         | Leaflet/Google Maps API |

</div>

---

## ⚙️ System Requirements

- ✅ PHP 7.x or higher
- ✅ MySQL 5.7 or MariaDB 10.3+
- ✅ Apache with mod_rewrite enabled
- ✅ Modern web browser (Chrome, Firefox, Safari, Edge)
- ✅ 2GB RAM minimum for smooth operation

---

## 🔒 Security Features

| Feature                   | Description                                         |
| ------------------------- | --------------------------------------------------- |
| 🔐 **Session Management** | Secure user sessions with timeout                   |
| 🛡️ **Role-Based Access**  | Admin pages require authentication and proper roles |
| 📝 **Audit Logging**      | All changes tracked with user and timestamp         |
| 🔄 **Undo Functionality** | Ability to revert changes (where supported)         |
| 📋 **Data Validation**    | Input validation on all forms                       |

---

## 📝 Important Notes

> **Admin Access**: All admin pages require authentication via session roles. Unauthorized users are automatically redirected to the login page.

> **Data Flow**: Controllers in `/database/controllers/` handle all data fetching and updates, ensuring consistent business logic across the platform.

> **User Interface**: The project uses Bootstrap 5 for responsive design and Chart.js for interactive data visualizations.

> **Public Transparency**: Citizens have access to a public audit log and project status dashboard, ensuring complete transparency in government spending.

---

## 📧 Support & Feedback

For issues, feature requests, or general feedback, please contact the QTrace development team through the system's reporting feature or official channels.
