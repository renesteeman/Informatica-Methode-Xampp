# -*- mode: python -*-

block_cipher = None


a = Analysis(['createParagraphs.py'],
             pathex=['C:\\Users\\steem\\Anaconda3\\Lib\\site-packages', 'F:\\xampp\\htdocs\\InformaticaMethode\\bestanden\\pageCreator'],
             binaries=[],
             datas=[],
             hiddenimports=[],
             hookspath=[],
             runtime_hooks=[],
             excludes=[],
             win_no_prefer_redirects=False,
             win_private_assemblies=False,
             cipher=block_cipher)
pyz = PYZ(a.pure, a.zipped_data,
             cipher=block_cipher)
exe = EXE(pyz,
          a.scripts,
          a.binaries,
          a.zipfiles,
          a.datas,
          name='createParagraphs',
          debug=False,
          strip=False,
          upx=True,
          console=False )
