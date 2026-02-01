## QTrace Website

QTrace is a transparency and monitoring platform for Quezon City government projects. It provides a public-facing portal for citizens and a secure admin portal for managing projects, reports, articles, contractors, and audit logs.

## How It Works

1. **Data Management (Admin)**
   - Admins log in to access dashboards and management pages.
   - Projects, contractors, articles, and reports are created/updated via forms.
   - Audit logs record changes for accountability and can be reviewed (and undone where supported).

2. **Public Access**
   - Citizens can explore projects, contractors, and updates.
   - Project pages include documents, gallery, and community reports.
   - Interactive map visualizes project locations and statuses.

3. **Data Sources**
   - Pages read from MySQL tables (projects, project details, contractors, articles, reports, users).
   - Controllers handle queries and expose data to views.

## Key Features

### Admin Features

- Analytics dashboard with KPIs and charts.
- CRUD management for projects, contractors, articles, and user accounts.
- Report moderation and status updates.
- Audit trail with diff view and undo support.
- Project map with filterable markers and list sync.

### Public Features

- Project directory with filters and pagination.
- Public articles/news updates and featured article.
- Contractor directory and profile pages.
- Project detail pages with documents and citizen reports.
- Public audit log viewer for transparency.
- Interactive project map with filters.

## Sitemap and Page Descriptions

### Admin (Main Sections and Child Pages)

- **Authentication**
  - pages/admin/login.php: Admin login form for QC ID and password with session feedback.

- **Dashboard**
  - pages/admin/dashboard.php: Admin analytics dashboard with project, budget, report, and user KPIs plus charts and recent activity.

- **Accounts (Main: list_account.php)**
  - pages/admin/list_account.php: User account list with search/filter and status actions.
  - pages/admin/add_account.php: New user registration form with personal/contact info.
  - pages/admin/edit_account.php: Edit user profile with personal/contact details.
  - pages/admin/view_account.php: Detailed user profile with activation/disable controls.

- **Projects (Main: list_project.php)**
  - pages/admin/list_project.php: Project list with filters, status badges, and actions.
  - pages/admin/add_project.php: Multi-step project creation with map picker and uploads.
  - pages/admin/edit_project.php: Multi-step project edit with map, budget, documents, and milestones.
  - pages/admin/view_project.php: Project detail view with documents, gallery, and reports.

- **Articles (Main: list_article.php)**
  - pages/admin/list_article.php: Article list with filters and view/edit actions.
  - pages/admin/add_article.php: Create article form tied to a project with image upload/URL.
  - pages/admin/edit_article.php: Edit article form with status/type and image options.
  - pages/admin/view_article.php: Article detail view with metadata and admin actions.

- **Contractors (Main: list_contractor.php)**
  - pages/admin/list_contractor.php: Contractor list with filters and actions.
  - pages/admin/add_contractor.php: Contractor registration with documents and validations.
  - pages/admin/edit_contractor.php: Edit contractor form with logo, docs, and expertise.
  - pages/admin/view_contractor.php: Contractor profile details with docs and status controls.

- **Reports (Main: list_reports.php)**
  - pages/admin/list_reports.php: Report list with filters and detail links.
  - pages/admin/view_report.php: Report detail view with evidence, comments, and status updates.

- **Audit Logs (Main: list_audit.php)**
  - pages/admin/list_audit.php: Audit log list with filters, diff view, and undo.

- **Map (Main: project_map.php)**
  - pages/admin/project_map.php: Admin project map with filters and sidebar list.

### Public (Main Sections and Child Pages)

- **Home**
  - pages/public/home.php: Public landing page with hero, stats, and calls to action.

- **About**
  - pages/public/aboutus.php: About page with mission, values, and impact stats.

- **Projects (Main: project.php)**
  - pages/public/project.php: Public project list with filters and pagination.
  - pages/public/projectDetails.php: Public project detail with docs, gallery, and citizen reports.
  - pages/public/map.php: Public interactive project map with filters and list.
  - pages/public/projectsAudit.php: Public audit log viewer with filters and change details.

- **Articles (Main: articles.php)**
  - pages/public/articles.php: Public articles list with featured item and pagination.
  - pages/public/view_article.php: Public article detail with project context.

- **Contractors (Main: contractor.php)**
  - pages/public/contractor.php: Public contractor list with search and filters.
  - pages/public/contractorDetails.php: Public contractor profile with docs and related projects.

## Notes

- Admin pages require authentication via session roles.
- Controllers in database/controllers handle data fetching and updates.
- The project uses Bootstrap 5 and Chart.js for UI and charts.
