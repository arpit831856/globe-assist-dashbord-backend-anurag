<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GlobeAssist — Time Slot</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,400&family=Sora:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shared.css') }}" />
<style>
/* ==================== TIME SLOT SPECIFIC STYLES ==================== */

.timeslot-container {
  background: var(--white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-200);
  margin-bottom: 24px;
}

/* Header */
.ts-header {
  padding: 24px 28px;
  border-bottom: 1px solid var(--gray-100);
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 14px;
}
.ts-header-left h2 {
  font-family: var(--font-display);
  font-size: 19px;
  font-weight: 700;
  color: var(--blue-950);
}
.ts-header-left p {
  font-size: 13px;
  color: var(--gray-400);
  margin-top: 4px;
}
.ts-header-right {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
}

.ts-btn {
  padding: 10px 18px;
  border-radius: var(--radius-sm);
  border: none;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.2s;
  display: flex;
  align-items: center;
  gap: 7px;
  font-family: var(--font-body);
}
.ts-btn-outline {
  background: var(--white);
  color: var(--gray-700);
  border: 1.5px solid var(--gray-200);
}
.ts-btn-outline:hover {
  border-color: var(--blue-400);
  color: var(--blue-600);
}
.ts-btn-primary {
  background: var(--blue-600);
  color: #fff;
}
.ts-btn-primary:hover {
  background: var(--accent-hover);
  transform: translateY(-1px);
  box-shadow: 0 6px 16px rgba(35,64,168,0.3);
}

/* Availability Table */
.ts-table-wrap {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

.ts-availability-table {
  width: 100%;
  border-collapse: collapse;
  min-width: 800px;
}
.ts-availability-table thead {
  background: var(--gray-100);
  border-bottom: 2px solid var(--gray-200);
}
.ts-availability-table th {
  padding: 14px 16px;
  text-align: left;
  font-size: 11px;
  font-weight: 700;
  color: var(--gray-500);
  text-transform: uppercase;
  letter-spacing: 0.6px;
  font-family: var(--font-display);
  white-space: nowrap;
}
.ts-availability-table td {
  padding: 16px;
  border-bottom: 1px solid var(--gray-100);
  font-size: 14px;
  color: var(--gray-700);
}
.ts-availability-table tbody tr:hover {
  background: var(--blue-50);
}
.ts-day-name {
  font-weight: 700;
  color: var(--blue-950);
  font-family: var(--font-display);
  min-width: 90px;
}
.ts-time-input {
  padding: 8px 12px;
  border: 1.5px solid var(--gray-200);
  border-radius: var(--radius-sm);
  font-family: var(--font-mono);
  font-size: 13px;
  width: 100%;
  max-width: 130px;
  outline: none;
  transition: 0.2s;
  color: var(--blue-950);
  background: var(--white);
}
.ts-time-input:focus {
  border-color: var(--blue-400);
  box-shadow: 0 0 0 3px rgba(35,64,168,0.08);
}

.ts-status {
  font-size: 12px;
  font-weight: 700;
  padding: 5px 13px;
  border-radius: 20px;
  display: inline-block;
  font-family: var(--font-display);
}
.ts-status.active {
  background: var(--success-bg);
  color: var(--success);
  border: 1px solid rgba(5,150,105,0.2);
}
.ts-status.inactive {
  background: var(--gray-100);
  color: var(--gray-500);
  border: 1px solid var(--gray-200);
}

/* Toggle switch */
.ts-toggle {
  display: flex;
  align-items: center;
  gap: 10px;
}
.toggle-switch {
  position: relative;
  width: 50px;
  height: 28px;
  background: var(--gray-300);
  border-radius: 20px;
  cursor: pointer;
  transition: background 0.3s;
  border: none;
  padding: 0;
  flex-shrink: 0;
}
.toggle-switch.active {
  background: var(--success);
}
.toggle-switch::after {
  content: '';
  position: absolute;
  width: 22px;
  height: 22px;
  background: white;
  border-radius: 50%;
  top: 3px;
  left: 3px;
  transition: left 0.3s;
  box-shadow: 0 1px 4px rgba(0,0,0,0.15);
}
.toggle-switch.active::after {
  left: 25px;
}

/* Service Requests Section */
.ts-requests-section {
  padding: 28px;
  background: var(--white);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  border: 1px solid var(--gray-200);
}
.ts-requests-section h3 {
  font-family: var(--font-display);
  font-size: 16px;
  font-weight: 800;
  color: var(--blue-950);
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 12px;
}
.ts-requests-section h3::before {
  content: '';
  width: 4px;
  height: 22px;
  background: var(--blue-600);
  border-radius: 2px;
  flex-shrink: 0;
}

.service-requests-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 16px;
}

/* Request Card */
.service-request-card {
  background: var(--gray-100);
  border: 1px solid var(--gray-200);
  border-radius: var(--radius-md);
  padding: 20px;
  transition: all 0.3s;
  position: relative;
  overflow: hidden;
}
.service-request-card:hover {
  box-shadow: var(--shadow-md);
  border-color: var(--blue-200);
  transform: translateY(-2px);
}
.service-request-card.unavailable {
  opacity: 0.7;
  background: var(--danger-bg);
  border-color: rgba(220,38,38,0.15);
}

.sr-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  font-size: 11px;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 20px;
  font-family: var(--font-display);
}
.sr-badge.available {
  background: var(--success-bg);
  color: var(--success);
  border: 1px solid rgba(5,150,105,0.2);
}
.sr-badge.unavailable {
  background: var(--danger-bg);
  color: var(--danger);
  border: 1px solid rgba(220,38,38,0.2);
}

.sr-client-info {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 16px;
}
.sr-avatar {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: var(--blue-100);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--blue-700);
  font-size: 18px;
  font-weight: 800;
  font-family: var(--font-display);
  flex-shrink: 0;
  border: 1px solid var(--blue-200);
}
.sr-client-name {
  font-family: var(--font-display);
  font-size: 14px;
  font-weight: 700;
  color: var(--blue-950);
  margin-bottom: 3px;
}
.sr-client-service {
  font-size: 12px;
  color: var(--gray-500);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 180px;
}

.sr-request-details {
  background: var(--white);
  border: 1px solid var(--gray-200);
  border-radius: var(--radius-sm);
  padding: 12px 14px;
  margin-bottom: 12px;
}
.sr-detail-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 6px 0;
  border-bottom: 1px solid var(--gray-100);
  font-size: 13px;
}
.sr-detail-row:last-child {
  border-bottom: none;
  padding-bottom: 0;
}
.sr-detail-label {
  color: var(--gray-500);
  font-weight: 500;
}
.sr-detail-value {
  color: var(--blue-950);
  font-weight: 700;
  font-family: var(--font-mono);
  font-size: 12px;
}

.sr-status-check {
  padding: 9px 13px;
  border-radius: var(--radius-sm);
  font-size: 12px;
  font-weight: 700;
  margin-bottom: 13px;
  font-family: var(--font-display);
  display: flex;
  align-items: center;
  gap: 7px;
}
.sr-status-check.available {
  background: var(--success-bg);
  color: var(--success);
  border: 1px solid rgba(5,150,105,0.2);
}
.sr-status-check.unavailable {
  background: var(--danger-bg);
  color: var(--danger);
  border: 1px solid rgba(220,38,38,0.2);
}

.sr-actions {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 8px;
}
.sr-action-btn {
  padding: 10px 12px;
  border: none;
  border-radius: var(--radius-sm);
  font-size: 12px;
  font-weight: 700;
  cursor: pointer;
  transition: 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 6px;
  font-family: var(--font-display);
  text-transform: uppercase;
  letter-spacing: 0.3px;
}
.sr-action-btn-accept {
  background: var(--success);
  color: #fff;
}
.sr-action-btn-accept:hover {
  background: #047857;
  transform: translateY(-1px);
}
.sr-action-btn-decline {
  background: var(--gray-200);
  color: var(--gray-600);
}
.sr-action-btn-decline:hover {
  background: var(--gray-300);
}
.sr-action-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  transform: none !important;
}

/* Empty state */
.ts-empty {
  text-align: center;
  padding: 52px 24px;
  color: var(--gray-400);
  grid-column: 1 / -1;
}
.ts-empty i {
  font-size: 42px;
  display: block;
  margin-bottom: 14px;
  color: var(--gray-300);
}
.ts-empty h4 {
  font-family: var(--font-display);
  font-size: 15px;
  color: var(--gray-500);
  margin-bottom: 6px;
  font-weight: 600;
}
.ts-empty p {
  font-size: 13px;
  color: var(--gray-400);
}

/* Time Slot Config Modal */
.ts-modal-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
}

/* ==================== RESPONSIVE ==================== */
@media (max-width: 768px) {
  .ts-header { flex-direction: column; align-items: flex-start; }
  .ts-availability-table { min-width: 600px; }
  .service-requests-grid { grid-template-columns: 1fr; }
}
@media (max-width: 599px) {
  .ts-header-right { width: 100%; flex-direction: column; }
  .ts-btn { width: 100%; justify-content: center; }
  .ts-availability-table { min-width: 480px; font-size: 12px; }
  .ts-availability-table td, .ts-availability-table th { padding: 10px 12px; }
  .sr-actions { grid-template-columns: 1fr; }
  .ts-modal-grid { grid-template-columns: 1fr; }
}
</style>
</head>
<body>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

<!-- Mobile Topbar -->
<div class="mobile-topbar">
  <button class="hamburger-btn" id="hamburgerBtn" onclick="toggleSidebar()" aria-label="Menu">
    <span class="bar"></span><span class="bar"></span><span class="bar"></span>
  </button>
  <div class="mobile-logo">Globe<span>Assist</span></div>
  <img src="https://i.pravatar.cc/150?img=4" class="mobile-user-avatar" alt="">
</div>

<!-- Sidebar -->

        @include('partner.layouts.sidebar');

<!-- Main Content -->
<div class="main">

<div class="page-header">
    <div class="page-header-left">
      <h1><i class="fa fa-calendar-days"></i> Availability & Time Slots</h1>
      <p>Set your working hours and manage service requests based on your availability</p>
    </div>
    <span class="page-header-badge" id="activeCount">6 / 7 Days Active</span>
  </div>

  <!-- Weekly Availability Table -->
  <div class="timeslot-container">
    <div class="ts-header">
      <div class="ts-header-left">
        <h2>Your Weekly Availability</h2>
        <p>Configure your working hours for each day of the week</p>
      </div>
      <div class="ts-header-right">
        <button class="ts-btn ts-btn-outline" onclick="resetAvailability()"><i class="fa fa-undo"></i> Reset All</button>
        <button class="ts-btn ts-btn-primary" onclick="saveAvailability()"><i class="fa fa-check"></i> Save Changes</button>
      </div>
    </div>
    <div class="ts-table-wrap">
      <table class="ts-availability-table">
        <thead>
          <tr>
            <th style="width:15%;">Day</th>
            <th style="width:25%;">Start Time</th>
            <th style="width:25%;">End Time</th>
            <th style="width:20%;">Status</th>
            <th style="width:15%;">Toggle</th>
          </tr>
        </thead>
        <tbody id="availabilityTableBody"></tbody>
      </table>
    </div>
  </div>

  <!-- Incoming Service Requests -->
  <div class="ts-requests-section">
    <h3>Incoming Service Requests</h3>
    <div class="service-requests-grid" id="serviceRequestsGrid"></div>
  </div>

</div><!-- end .main -->

<!-- ==================== MODALS ==================== -->

<!-- Logout Modal -->
<div class="modal-bg" id="logoutModal">
  <div class="modal-box md">
    <div class="modal-hdr"><h3>Confirm Logout</h3><button class="modal-close" onclick="closeLogoutModal()">×</button></div>
    <div class="modal-body modal-danger">
      <div class="modal-icon"><i class="fa fa-sign-out-alt"></i></div>
      <h3 class="modal-title">Are you sure you want to logout?</h3>
      <p class="modal-desc">You will be logged out of your account. Make sure to save any pending work.</p>
      <div class="modal-actions">
        <button class="modal-btn modal-btn-danger" onclick="alert('Logged out!');location.href='index.html';"><i class="fa fa-check"></i> Yes, Logout</button>
        <button class="modal-btn modal-btn-secondary" onclick="closeLogoutModal()"><i class="fa fa-times"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Time Slot Config Modal -->
<div class="modal-bg" id="timeSlotModal">
  <div class="modal-box md">
    <div class="modal-hdr">
      <h3><i class="fa fa-clock" style="color:var(--blue-500);margin-right:8px;"></i>Configure Time Slot</h3>
      <button class="modal-close" onclick="closeTimeSlotModal()">×</button>
    </div>
    <div class="modal-body">
      <form id="timeSlotForm" onsubmit="saveTimeSlot(event)">
        <div class="f-field">
          <label>Day of Week</label>
          <select id="tsDay" required>
            <option value="">Select Day</option>
            <option>Monday</option><option>Tuesday</option><option>Wednesday</option>
            <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option>
          </select>
        </div>
        <div class="ts-modal-grid">
          <div class="f-field">
            <label>Start Time</label>
            <input type="time" id="tsStartTime" required>
          </div>
          <div class="f-field">
            <label>End Time</label>
            <input type="time" id="tsEndTime" required>
          </div>
        </div>
        <div class="f-field" style="display:flex;align-items:center;gap:10px;margin-top:6px;">
          <input type="checkbox" id="tsActive" checked style="width:18px;height:18px;cursor:pointer;accent-color:var(--blue-600);">
          <label style="margin:0;text-transform:none;font-size:14px;color:var(--gray-600);font-weight:500;letter-spacing:0;">Available on this day</label>
        </div>
        <button type="submit" class="modal-submit"><i class="fa fa-check"></i> Save Time Slot</button>
      </form>
    </div>
  </div>
</div>

<script src="{{ asset('js/shared.js') }}"></script>
<script>
/* ==================== TIME SLOT DATA ==================== */
var availabilityData = {
  'Monday':    { startTime: '09:00', endTime: '18:00', isActive: false },
  'Tuesday':   { startTime: '09:00', endTime: '18:00', isActive: false },
  'Wednesday': { startTime: '09:00', endTime: '18:00', isActive: false },
  'Thursday':  { startTime: '09:00', endTime: '18:00', isActive: false },
  'Friday':    { startTime: '09:00', endTime: '18:00', isActive: false },
  'Saturday':  { startTime: '10:00', endTime: '16:00', isActive: false },
  'Sunday':    { startTime: '00:00', endTime: '00:00', isActive: false }
};

var serviceRequests = [
  { id: 'REQ-001', clientName: 'Sharma Family',   clientAvatar: 'SF', service: 'Tour Management - Delhi',          requestDate: 'Mar 06, 2026', preferredDate: 'Mar 08, 2026', preferredTime: '10:00 – 18:00', preferredDay: 'Friday',    status: 'pending' },
  { id: 'REQ-002', clientName: 'Patel Events',    clientAvatar: 'PE', service: 'Event Coordination - Wedding',      requestDate: 'Mar 05, 2026', preferredDate: 'Mar 15, 2026', preferredTime: '09:00 – 22:00', preferredDay: 'Friday',    status: 'pending' },
  { id: 'REQ-003', clientName: 'ABC Corporation', clientAvatar: 'AC', service: 'Ground Staff - Conference',         requestDate: 'Mar 04, 2026', preferredDate: 'Mar 12, 2026', preferredTime: '08:00 – 17:00', preferredDay: 'Wednesday', status: 'pending' },
  { id: 'REQ-004', clientName: 'XYZ Industries',  clientAvatar: 'XI', service: 'Photography - Corporate Event',     requestDate: 'Mar 03, 2026', preferredDate: 'Mar 20, 2026', preferredTime: '15:00 – 23:00', preferredDay: 'Sunday',    status: 'pending' },
  { id: 'REQ-005', clientName: 'Tech Startup',    clientAvatar: 'TS', service: 'Event Management - Product Launch', requestDate: 'Mar 02, 2026', preferredDate: 'Mar 10, 2026', preferredTime: '12:00 – 20:00', preferredDay: 'Monday',    status: 'pending' }
];

/* ==================== RENDER AVAILABILITY TABLE ==================== */
function renderAvailabilityTable() {
  var tbody = document.getElementById('availabilityTableBody');
  tbody.innerHTML = '';
  var days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
  var activeDays = days.filter(function(d) { return availabilityData[d].isActive; }).length;
  document.getElementById('activeCount').textContent = activeDays + ' / 7 Days Active';

  days.forEach(function(day) {
    var slot = availabilityData[day];
    var tr = document.createElement('tr');
    tr.innerHTML =
      '<td class="ts-day-name">' + day + '</td>' +
      '<td><input type="time" class="ts-time-input" value="' + slot.startTime + '" ' + (slot.isActive ? '' : 'disabled') + ' onchange="updateTime(\'' + day + '\',\'start\',this.value)"></td>' +
      '<td><input type="time" class="ts-time-input" value="' + slot.endTime + '" ' + (slot.isActive ? '' : 'disabled') + ' onchange="updateTime(\'' + day + '\',\'end\',this.value)"></td>' +
      '<td><span class="ts-status ' + (slot.isActive ? 'active' : 'inactive') + '">' + (slot.isActive ? '<i class="fa fa-circle-check" style="margin-right:5px;"></i>Available' : '<i class="fa fa-circle-xmark" style="margin-right:5px;"></i>Not Available') + '</span></td>' +
      '<td><div class="ts-toggle"><button type="button" class="toggle-switch ' + (slot.isActive ? 'active' : '') + '" onclick="toggleDay(\'' + day + '\',this)" aria-label="Toggle ' + day + '"></button></div></td>';
    tbody.appendChild(tr);
  });
}

/* ==================== RENDER SERVICE REQUESTS ==================== */
function renderServiceRequests() {
  var grid = document.getElementById('serviceRequestsGrid');
  grid.innerHTML = '';

  if (serviceRequests.length === 0) {
    grid.innerHTML =
      '<div class="ts-empty">' +
        '<i class="fa fa-inbox"></i>' +
        '<h4>No Service Requests</h4>' +
        '<p>You\'ll receive service requests from clients here.<br>Check your availability settings above.</p>' +
      '</div>';
    return;
  }

  serviceRequests.forEach(function(req) {
    var slot = availabilityData[req.preferredDay];
    var avail = slot && slot.isActive;
    var card = document.createElement('div');
    card.className = 'service-request-card' + (avail ? '' : ' unavailable');
    card.innerHTML =
      '<div class="sr-badge ' + (avail ? 'available' : 'unavailable') + '">' + (avail ? '✓ Available' : '✕ Unavailable') + '</div>' +
      '<div class="sr-client-info">' +
        '<div class="sr-avatar">' + req.clientAvatar + '</div>' +
        '<div>' +
          '<div class="sr-client-name">' + req.clientName + '</div>' +
          '<div class="sr-client-service">' + req.service + '</div>' +
        '</div>' +
      '</div>' +
      '<div class="sr-request-details">' +
        '<div class="sr-detail-row"><span class="sr-detail-label"><i class="fa fa-calendar" style="margin-right:5px;"></i>Date</span><span class="sr-detail-value">' + req.preferredDate + '</span></div>' +
        '<div class="sr-detail-row"><span class="sr-detail-label"><i class="fa fa-clock" style="margin-right:5px;"></i>Time</span><span class="sr-detail-value">' + req.preferredTime + '</span></div>' +
        '<div class="sr-detail-row"><span class="sr-detail-label"><i class="fa fa-calendar-days" style="margin-right:5px;"></i>Day</span><span class="sr-detail-value">' + req.preferredDay + '</span></div>' +
      '</div>' +
      '<div class="sr-status-check ' + (avail ? 'available' : 'unavailable') + '">' +
        (avail ? '<i class="fa fa-circle-check"></i> Time slot is available' : '<i class="fa fa-circle-xmark"></i> Outside your working hours') +
      '</div>' +
      '<div class="sr-actions">' +
        '<button type="button" class="sr-action-btn sr-action-btn-accept" ' + (avail ? '' : 'disabled') + ' onclick="acceptRequest(\'' + req.id + '\')">' +
          '<i class="fa fa-check"></i> Accept' +
        '</button>' +
        '<button type="button" class="sr-action-btn sr-action-btn-decline" onclick="declineRequest(\'' + req.id + '\')">' +
          '<i class="fa fa-times"></i> Not Available' +
        '</button>' +
      '</div>';
    grid.appendChild(card);
  });
}

/* ==================== ACTIONS ==================== */
function updateTime(day, type, value) {
  if (type === 'start') availabilityData[day].startTime = value;
  else availabilityData[day].endTime = value;
}

function toggleDay(day, btn) {
  availabilityData[day].isActive = !availabilityData[day].isActive;
  renderAvailabilityTable();
  renderServiceRequests();
}
function showMessage(message, type = 'success') {
    let box = document.getElementById('msgBox');

    if (!box) {
        box = document.createElement('div');
        box.id = 'msgBox';
        box.style.position = 'fixed';
        box.style.top = '20px';
        box.style.right = '20px';
        box.style.zIndex = '9999';
        box.style.padding = '12px 18px';
        box.style.borderRadius = '8px';
        box.style.color = '#fff';
        box.style.fontWeight = 'bold';
        document.body.appendChild(box);
    }

    box.innerHTML = message;
    box.style.background = type === 'success' ? '#28a745' : '#dc3545';
    box.style.display = 'block';

    setTimeout(() => {
        box.style.display = 'none';
    }, 3000);
}
function saveAvailability() {

    let slots = [];

    Object.keys(availabilityData).forEach(function(day) {

        let slot = availabilityData[day];

        // ✅ Only active rows send karo
        if (slot.isActive) {
            slots.push({
                day: day,
                start_time: slot.startTime,
                end_time: slot.endTime,
                status: 'Free'
            });
        }
    });

    fetch("{{ route('partner.save-slots') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ slots: slots })
    })
    .then(res => res.json())
    .then(data => {

        if (data.success) {
            showMessage(data.message, 'success');
        } else {
            showMessage(data.message, 'error');
        }

    })
    .catch(error => {
        showMessage('Something went wrong!', 'error');
    });
}

function resetAvailability() {
  if (!confirm('Reset all time slots to default (Mon–Fri 9:00–18:00, Sat 10:00–16:00, Sun Off)?')) return;
  availabilityData = {
    'Monday':    { startTime: '09:00', endTime: '18:00', isActive: true },
    'Tuesday':   { startTime: '09:00', endTime: '18:00', isActive: true },
    'Wednesday': { startTime: '09:00', endTime: '18:00', isActive: true },
    'Thursday':  { startTime: '09:00', endTime: '18:00', isActive: true },
    'Friday':    { startTime: '09:00', endTime: '18:00', isActive: true },
    'Saturday':  { startTime: '10:00', endTime: '16:00', isActive: true },
    'Sunday':    { startTime: '00:00', endTime: '00:00', isActive: false }
  };
  renderAvailabilityTable();
  renderServiceRequests();
}

function acceptRequest(reqId) {
  var req = serviceRequests.find(function(r) { return r.id === reqId; });
  if (!req) return;
  alert('✓ Request accepted!\n\nClient: ' + req.clientName + '\nService: ' + req.service + '\nDate: ' + req.preferredDate + '\n\nYou will receive further details shortly.');
  serviceRequests = serviceRequests.filter(function(r) { return r.id !== reqId; });
  renderServiceRequests();
}

function declineRequest(reqId) {
  var req = serviceRequests.find(function(r) { return r.id === reqId; });
  if (!req) return;
  if (!confirm('Decline request from ' + req.clientName + '?')) return;
  alert('Request declined. The client has been notified.');
  serviceRequests = serviceRequests.filter(function(r) { return r.id !== reqId; });
  renderServiceRequests();
}

/* Time slot modal */
function openTimeSlotModal(day) {
  if (day) {
    var slot = availabilityData[day];
    document.getElementById('tsDay').value = day;
    document.getElementById('tsStartTime').value = slot.startTime;
    document.getElementById('tsEndTime').value = slot.endTime;
    document.getElementById('tsActive').checked = slot.isActive;
  } else {
    document.getElementById('timeSlotForm').reset();
  }
  document.getElementById('timeSlotModal').classList.add('open');
}
function closeTimeSlotModal() {
  document.getElementById('timeSlotModal').classList.remove('open');
}
function saveTimeSlot(e) {
  e.preventDefault();
  var day = document.getElementById('tsDay').value;
  availabilityData[day] = {
    startTime: document.getElementById('tsStartTime').value,
    endTime:   document.getElementById('tsEndTime').value,
    isActive:  document.getElementById('tsActive').checked
  };
  alert('✓ Time slot updated for ' + day);
  closeTimeSlotModal();
  renderAvailabilityTable();
  renderServiceRequests();
}

/* Init */
document.addEventListener('DOMContentLoaded', function() {
  renderAvailabilityTable();
  renderServiceRequests();
});
</script>
</body>
</html>
