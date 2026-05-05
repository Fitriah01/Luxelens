import re

with open('resources/views/beranda.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

start = content.find('        <div class="grid grid-cols-1 md:grid-cols-3 gap-16 max-w-6xl mx-auto">')
end_tag = '    </section>'
end = content.find(end_tag, start) + len(end_tag)

print(f'Block found: chars {start}–{end}')

new_block = r"""        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 max-w-6xl mx-auto">
            @foreach ($testimonials as $t)
                <div class="relative p-6 bg-[#0d0d0d] border border-white/5 group transition-all duration-500 hover:border-[#E1C564]/20 flex flex-col">
                    <span class="absolute top-4 left-5 text-4xl text-[#E1C564] opacity-10 font-serif leading-none">"</span>
                    <p class="relative z-10 text-white text-sm leading-relaxed mb-4 flex-1 group-hover:text-white/90 transition duration-500">
                        {{ $t->pesan }}
                    </p>
                    <div class="flex items-center gap-4 pt-3 border-t border-white/5 mb-2">
                        <div class="w-5 h-px bg-[#E1C564] opacity-40 shrink-0"></div>
                        <div>
                            <strong class="text-[#E1C564] block text-[10px] tracking-[0.25em] uppercase">{{ $t->nama_customer }}</strong>
                            <div class="flex mt-1 gap-0.5">
                                @for ($i = 0; $i < $t->bintang; $i++)
                                    <span class="text-[8px] text-[#E1C564]">★</span>
                                @endfor
                            </div>
                        </div>
                    </div>
                    @if (!empty($t->admin_reply))
                        <div class="pl-3 border-l border-[#E1C564]/20">
                            <span class="text-[8px] uppercase tracking-[0.2em] text-[#E1C564]/40">Admin · </span>
                            <span class="text-[11px] text-gray-600 italic">{{ $t->admin_reply }}</span>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>"""

new_content = content[:start] + new_block + content[end:]

with open('resources/views/beranda.blade.php', 'w', encoding='utf-8') as f:
    f.write(new_content)

print('Done.')
