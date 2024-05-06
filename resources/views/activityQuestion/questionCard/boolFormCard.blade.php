<div class="bg-[#ecf2f7] flex items-center justify-center min-h-screen font-nunito text-slate-600">
    <div class="max-w-[968px] w-full mx-4">

        <h1 class="mx-2 my-10 text-2xl font-semibold text-center sm:text-3xl">Verdadero/Falso</h1>
        <ul
            class="w-full bg-white p-8 rounded-lg gap-3 flex items-start justify-center shadow-[0px_10px_15px_9px_#DDE4F1] flex-col sm:flex-row mb-10">
            <li class="pr-4 grow">
                <h2 class="mb-3 text-xl font-[800] mt-3">{{ $question->question_text }}</h2>
                <p class="max-w-lg text-lg">Marca si consideras que la afirmación es verdadera o falsa.
                </p>
            </li>
            <li class="bg-[#f4faff] px-4 rounded-md min-w-[240px] self-stretch flex items-start justify-center flex-col">
                <label for="verdadero"
                    class="flex items-center justify-start w-full gap-0 p-3 font-semibold cursor-pointer">
                    <input type="radio" class="" name="boolQuestion-{{ $question->id }}" id="verdadero"
                        value="true">
                    <span class="inline-block pl-3 text-xl">Verdadero</span>
                </label>
                <label for="falso"
                    class="flex items-center justify-start w-full gap-2 p-3 font-semibold cursor-pointer">
                    <input type="radio" class="" name="boolQuestion-{{ $question->id }}" id="falso"
                        value="false">
                    <span class="text-xl"> <span class="text-sm text-slate-800">Falso</span></span>
                </label>
            </li>
        </ul>

    </div>
</div>
