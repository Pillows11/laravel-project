<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 shadow-xl rounded-lg border-separate border-spacing-0">
            <thead>
                <tr>
                    <th class="bg-purple-600 text-white text-center uppercase font-bold py-3 px-6 border-b-4 border-pink-500">No</th>
                    <th class="bg-purple-600 text-white text-center uppercase font-bold py-3 px-6 border-b-4 border-pink-500">Nama</th>
                    <th class="bg-purple-600 text-white text-center uppercase font-bold py-3 px-6 border-b-4 border-pink-500">Departement</th>
                    <th class="bg-purple-600 text-white text-center uppercase font-bold py-3 px-6 border-b-4 border-pink-500">List Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                <tr class="bg-white hover:bg-gradient-to-r hover:from-yellow-400 hover:via-orange-400 hover:to-pink-400 transition-all duration-500 ease-in-out transform hover:scale-105">
                    <td class="text-center py-3 px-6 border-b border-gray-300 font-semibold">{{ $grade->id}}</td>
                    <td class="text-center py-3 px-6 border-b border-gray-300 font-semibold">{{ $grade->nama }}</td>
                    <td class="text-center py-3 px-6 border-b border-gray-300 font-semibold">{{$grade->departement->nama}}</td>
                    <td class="text-center py-3 px-6 border-b border-gray-300 font-semibold">
                        @foreach ($grade->students as $student)
                        <ul>
                            <li>{{ $student->nama }}</li>
                        </ul>
                        @endforeach</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
