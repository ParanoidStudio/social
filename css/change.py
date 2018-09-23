from tempfile import mkstemp 
from shutil import move
from os import fdopen,remove


def replace(file_path,pattern, subst):
	# Create temp file
	fh, abs_path = mkstemp()
	with fdopen(fh,'w') as new_file:
		with open(file_path) as old_file:
			for line in old_file:
				new_file.write(line.replace(pattern, subst))
	# Remove original file
	remove(file_path)
	#Move new file
	move(abs_path, file_path)

file_path = input('Введите путь к файлу: ') 
pattern = input('Что вы хотите заменить: ')
subst = input('На что вы хотите заменить: ')
replace(file_path, pattern, subst)
