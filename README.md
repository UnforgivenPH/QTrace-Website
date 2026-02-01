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

### Admin Portal

Authentication
|------ Login: Admin login form for QC ID and password with session feedback.

Dashboard
|------ Dashboard: Analytics dashboard with project, budget, report, and user KPIs plus charts and recent activity.

Accounts
|------ Accounts: User account list with search/filter and status actions.
|------ Add Account: New user registration form with personal/contact info.
|------ Edit Account: Edit user profile with personal/contact details.
|------ View Account: Detailed user profile with activation/disable controls.

Projects
|------ Projects: Project list with filters, status badges, and actions.
|------ Add Project: Multi-step project creation with map picker and uploads.
|------ Edit Project: Multi-step project edit with map, budget, documents, and milestones.
|------ View Project: Project detail view with documents, gallery, and reports.

Articles
|------ Articles: Article list with filters and view/edit actions.
|------ Add Article: Create article form tied to a project with image upload/URL.
|------ Edit Article: Edit article form with status/type and image options.
|------ View Article: Article detail view with metadata and admin actions.

Contractors
|------ Contractors: Contractor list with filters and actions.
|------ Add Contractor: Contractor registration with documents and validations.
|------ Edit Contractor: Edit contractor form with logo, docs, and expertise.
|------ View Contractor: Contractor profile details with docs and status controls.

Reports
|------ Reports: Report list with filters and detail links.
|------ View Report: Report detail view with evidence, comments, and status updates.

Audit Logs
|------ Audit Logs: Audit log list with filters, diff view, and undo.

Map
|------ Project Map: Admin project map with filters and sidebar list.

### Public Portal

Home
|------ Home: Public landing page with hero, stats, and calls to action.

About
|------ About Us: About page with mission, values, and impact stats.

Projects
|------ Projects: Public project list with filters and pagination.
|------ View Project: Public project detail with docs, gallery, and citizen reports.
|------ Project Map: Public interactive project map with filters and list.
|------ Project Audit: Public audit log viewer with filters and change details.

Articles
|------ Articles: Public articles list with featured item and pagination.
|------ View Article: Public article detail with project context.

Contractors
|------ Contractors: Public contractor list with search and filters.
|------ View Contractor: Public contractor profile with docs and related projects.

## Notes

- Admin pages require authentication via session roles.
- Controllers in database/controllers handle data fetching and updates.
- The project uses Bootstrap 5 and Chart.js for UI and charts.
