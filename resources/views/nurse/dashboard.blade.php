<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nurse Dashboard - USM Pharmacy</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }
        [x-cloak] { display: none !important; }
        .sidebar-item { color: rgba(255, 255, 255, 0.7); }
        .sidebar-item:hover, .sidebar-item.active { color: white; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex" 
      x-data="{
        activeTab: 'dashboard',
        searchTerm: '',
        showAddModal: false,
        sidebarOpen: true,
        newPrescription: { patientName: '', medicine: '', dosage: '', quantity: 0 },
        prescriptions: [
            { id: 'RX001', patientName: 'John Doe', medicine: 'Amoxicillin 500mg', dosage: '500mg', quantity: 30, status: 'pending', inStock: true, date: '2026-04-25' },
            { id: 'RX002', patientName: 'Jane Smith', medicine: 'Lisinopril 10mg', dosage: '10mg', quantity: 60, status: 'pending', inStock: true, date: '2026-04-25' },
            { id: 'RX003', patientName: 'Bob Johnson', medicine: 'Metformin 850mg', dosage: '850mg', quantity: 90, status: 'routed', inStock: true, date: '2026-04-24' },
            { id: 'RX004', patientName: 'Alice Brown', medicine: 'Atorvastatin 40mg', dosage: '40mg', quantity: 30, status: 'pending', inStock: false, date: '2026-04-25' }
        ],
        inventory: [
            { name: 'Amoxicillin 500mg', stock: 250, unit: 'tablets', category: 'Antibiotic' },
            { name: 'Lisinopril 10mg', stock: 180, unit: 'tablets', category: 'Blood Pressure' },
            { name: 'Metformin 850mg', stock: 320, unit: 'tablets', category: 'Diabetes' },
            { name: 'Atorvastatin 40mg', stock: 0, unit: 'tablets', category: 'Cholesterol' },
            { name: 'Ibuprofen 400mg', stock: 500, unit: 'tablets', category: 'Pain Relief' }
        ],
        routePrescription(id) {
            const rx = this.prescriptions.find(r => r.id === id);
            if (rx && rx.inStock) {
                rx.status = 'routed';
                lucide.createIcons();
            }
        },
        addPrescription() {
            if (this.newPrescription.patientName && this.newPrescription.medicine && this.newPrescription.quantity > 0) {
                const med = this.inventory.find(i => i.name.toLowerCase() === this.newPrescription.medicine.toLowerCase());
                const newRx = {
                    id: 'RX' + String(this.prescriptions.length + 1).padStart(3, '0'),
                    patientName: this.newPrescription.patientName,
                    medicine: this.newPrescription.medicine,
                    dosage: this.newPrescription.dosage,
                    quantity: this.newPrescription.quantity,
                    status: 'pending',
                    inStock: med ? med.stock > 0 : false,
                    date: new Date().toISOString().split('T')[0]
                };
                this.prescriptions.unshift(newRx);
                this.newPrescription = { patientName: '', medicine: '', dosage: '', quantity: 0 };
                this.showAddModal = false;
                this.activeTab = 'prescriptions';
                this.$nextTick(() => lucide.createIcons());
            }
        },
        get filteredInventory() {
            return this.inventory.filter(i => i.name.toLowerCase().includes(this.searchTerm.toLowerCase()));
        }
      }">

    <!-- Sidebar -->
    <aside class="text-white w-64 min-h-screen flex-shrink-0 transition-all duration-300 z-50 border-r-4 border-yellow-500"
           style="background: linear-gradient(to bottom, #064e3b, #065f46);"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full fixed'">
        <div class="p-6">
            <div class="flex items-center gap-3 mb-10">
                <img src="https://www.usm.edu.ph/wp-content/uploads/2021/08/usm_logo.png" alt="USM Logo" class="h-12 w-auto bg-white rounded-full p-1" onerror="this.src='https://ui-avatars.com/api/?name=USM&background=eab308&color=fff'">
                <div>
                    <h2 class="font-bold text-lg leading-tight bg-gradient-to-r from-yellow-300 to-orange-400 text-gradient">USM PHARMACY</h2>
                    <p class="text-[10px] text-green-200">NURSE PORTAL</p>
                </div>
            </div>

            <nav class="space-y-2">
                <button @click="activeTab = 'dashboard'" 
                        :class="activeTab === 'dashboard' ? 'bg-yellow-500 text-green-900 active' : 'hover:bg-green-700/50 sidebar-item'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-bold group">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </button>
                <button @click="activeTab = 'prescriptions'" 
                        :class="activeTab === 'prescriptions' ? 'bg-yellow-500 text-green-900 active' : 'hover:bg-green-700/50 sidebar-item'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-bold group">
                    <i data-lucide="send" class="w-5 h-5"></i>
                    <span>Prescriptions</span>
                </button>
                <button @click="activeTab = 'inventory'" 
                        :class="activeTab === 'inventory' ? 'bg-yellow-500 text-green-900 active' : 'hover:bg-green-700/50 sidebar-item'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-bold group">
                    <i data-lucide="package" class="w-5 h-5"></i>
                    <span>Inventory</span>
                </button>
            </nav>
        </div>

        <div class="absolute bottom-0 w-full p-6 space-y-4 border-t border-green-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-green-900 font-bold">NS</div>
                <div>
                    <p class="text-sm font-bold">Nurse Sarah</p>
                    <p class="text-xs text-green-300">N-2026-001</p>
                </div>
            </div>
            <a href="{{ url('/login') }}" class="flex items-center gap-2 text-sm text-green-300 hover:text-white transition-colors">
                <i data-lucide="log-out" class="w-4 h-4"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-8 py-4 flex items-center justify-between z-10">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 hover:bg-gray-100 rounded-lg lg:hidden">
                    <i data-lucide="menu" class="w-6 h-6 text-gray-600"></i>
                </button>
                <h2 class="text-2xl font-black text-gray-800 uppercase tracking-tighter" x-text="activeTab"></h2>
            </div>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <button class="p-2 hover:bg-gray-100 rounded-lg relative">
                        <i data-lucide="bell" class="w-6 h-6 text-gray-600"></i>
                        <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
                <button @click="showAddModal = true" 
                        class="bg-gradient-to-r from-green-600 via-yellow-500 to-orange-500 text-white px-6 py-2 rounded-full font-bold hover:shadow-lg transition-all flex items-center gap-2">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                    <span>New Prescription</span>
                </button>
            </div>
        </header>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-8 bg-gray-50/50">
            
            <!-- Dashboard View -->
            <div x-show="activeTab === 'dashboard'" x-cloak class="space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-green-600">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Prescriptions</p>
                                <p class="text-3xl font-bold text-gray-900" x-text="prescriptions.length"></p>
                            </div>
                            <div class="p-3 bg-green-50 rounded-xl">
                                <i data-lucide="file-text" class="text-green-600 w-8 h-8"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Pending Route</p>
                                <p class="text-3xl font-bold text-gray-900" x-text="prescriptions.filter(rx => rx.status === 'pending').length"></p>
                            </div>
                            <div class="p-3 bg-yellow-50 rounded-xl">
                                <i data-lucide="send" class="text-yellow-600 w-8 h-8"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-orange-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Out of Stock Alerts</p>
                                <p class="text-3xl font-bold text-gray-900" x-text="inventory.filter(i => i.stock === 0).length"></p>
                            </div>
                            <div class="p-3 bg-red-50 rounded-xl">
                                <i data-lucide="alert-triangle" class="text-red-500 w-8 h-8"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i data-lucide="clock" class="text-green-600 w-5 h-5"></i> Recent Activities
                        </h3>
                        <div class="space-y-4">
                            <template x-for="rx in prescriptions.slice(0, 5)">
                                <div class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-xl transition-colors">
                                    <div :class="rx.status === 'routed' ? 'bg-green-100' : 'bg-yellow-100'" class="p-2 rounded-lg">
                                        <i :data-lucide="rx.status === 'routed' ? 'check' : 'hourglass'" class="w-4 h-4" :class="rx.status === 'routed' ? 'text-green-600' : 'text-yellow-600'"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-bold text-gray-800" x-text="rx.patientName"></p>
                                        <p class="text-xs text-gray-500" x-text="rx.medicine"></p>
                                    </div>
                                    <p class="text-[10px] text-gray-400 font-medium" x-text="rx.date"></p>
                                </div>
                            </template>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i data-lucide="package" class="text-orange-500 w-5 h-5"></i> Low Stock Medicines
                        </h3>
                        <div class="space-y-4">
                            <template x-for="item in inventory.filter(i => i.stock < 100)">
                                <div class="flex items-center justify-between p-3 border border-orange-100 bg-orange-50/30 rounded-xl">
                                    <p class="text-sm font-bold text-gray-800" x-text="item.name"></p>
                                    <span class="text-xs font-bold text-orange-600" x-text="item.stock + ' left'"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prescriptions View -->
            <div x-show="activeTab === 'prescriptions'" x-cloak class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Patient / ID</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Medicine</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <template x-for="rx in prescriptions" :key="rx.id">
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-gray-800" x-text="rx.patientName"></p>
                                        <p class="text-xs text-gray-400" x-text="rx.id"></p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm font-medium text-gray-800" x-text="rx.medicine"></p>
                                        <p class="text-xs text-gray-400" x-text="rx.quantity + ' tablets (' + rx.dosage + ')'"></p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider"
                                              :class="rx.status === 'routed' ? 'bg-green-100 text-green-700' : (rx.inStock ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700')"
                                              x-text="rx.status === 'routed' ? 'Routed' : (rx.inStock ? 'Pending' : 'No Stock')">
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <template x-if="rx.status === 'pending'">
                                            <button @click="routePrescription(rx.id)"
                                                    :disabled="!rx.inStock"
                                                    class="px-4 py-2 rounded-lg text-xs font-bold transition-all"
                                                    :class="rx.inStock ? 'bg-green-600 text-white hover:bg-green-700 shadow-sm' : 'bg-gray-200 text-gray-400 cursor-not-allowed'">
                                                Route to Pharmacy
                                            </button>
                                        </template>
                                        <template x-if="rx.status === 'routed'">
                                            <span class="text-green-600 font-bold text-xs flex items-center justify-end gap-1">
                                                <i data-lucide="check" class="w-4 h-4"></i> Completed
                                            </span>
                                        </template>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Inventory View -->
            <div x-show="activeTab === 'inventory'" x-cloak class="space-y-6">
                <div class="flex flex-col md:flex-row gap-4 items-center justify-between mb-2">
                    <div class="relative w-full md:w-96">
                        <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                        <input type="text" placeholder="Search medicine name or category..." x-model="searchTerm"
                               class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="item in filteredInventory">
                        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100 hover:border-green-200 transition-all hover:shadow-md group">
                            <div class="flex justify-between items-start mb-4">
                                <div class="p-3 bg-gray-50 rounded-xl group-hover:bg-green-50 transition-colors">
                                    <i data-lucide="pill" class="text-gray-400 group-hover:text-green-600 w-6 h-6"></i>
                                </div>
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase"
                                      :class="item.stock === 0 ? 'bg-red-50 text-red-600' : (item.stock < 100 ? 'bg-yellow-50 text-yellow-600' : 'bg-green-50 text-green-600')"
                                      x-text="item.stock === 0 ? 'Out of Stock' : (item.stock < 100 ? 'Low Stock' : 'Good Stock')">
                                </span>
                            </div>
                            <h4 class="font-bold text-gray-800 text-lg mb-1" x-text="item.name"></h4>
                            <p class="text-xs text-gray-400 mb-4" x-text="item.category"></p>
                            <div class="flex items-end justify-between">
                                <div>
                                    <p class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">Current Stock</p>
                                    <p class="text-xl font-bold text-gray-800" x-text="item.stock + ' ' + item.unit"></p>
                                </div>
                                <button class="text-green-600 hover:text-green-700 p-2 rounded-lg hover:bg-green-50 transition-colors">
                                    <i data-lucide="edit-3" class="w-5 h-5"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

        </div>
    </main>

    <!-- Add Modal -->
    <div x-show="showAddModal" 
         class="fixed inset-0 bg-black/60 flex items-center justify-center p-4 z-[100]"
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         @click.away="showAddModal = false">
        
        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full overflow-hidden">
            <div class="bg-gradient-to-r from-green-800 to-green-700 text-white p-8 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-2xl font-bold bg-gradient-to-r from-yellow-300 to-orange-400 text-gradient">New Prescription</h3>
                    <p class="text-green-100 text-sm mt-1 opacity-80">Process a new medication request</p>
                </div>
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
            </div>

            <div class="p-8 space-y-5">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Patient Name</label>
                    <input type="text" x-model="newPrescription.patientName" placeholder="Full name of patient"
                           class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-green-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Medication</label>
                    <select x-model="newPrescription.medicine" class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-green-500 transition-all appearance-none">
                        <option value="">Select available medicine</option>
                        <template x-for="item in inventory">
                            <option :value="item.name" x-text="item.name + ' (' + item.stock + ')'"></option>
                        </template>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Dosage</label>
                        <input type="text" x-model="newPrescription.dosage" placeholder="e.g. 500mg"
                               class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-green-500 transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Quantity</label>
                        <input type="number" x-model.number="newPrescription.quantity" placeholder="No. tablets"
                               class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-green-500 transition-all">
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button @click="addPrescription" class="flex-1 bg-gradient-to-r from-green-700 to-green-600 text-white py-4 rounded-2xl font-bold hover:shadow-xl hover:scale-[1.02] transition-all">
                        Create & Send
                    </button>
                    <button @click="showAddModal = false" class="px-6 py-4 bg-gray-100 text-gray-500 rounded-2xl font-bold hover:bg-gray-200 transition-all">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>
</html>
