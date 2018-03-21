<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
<table style="border-collapse: collapse;">
	<?
	foreach ($arResult['FIELDS'] as $field) {
		?>
		<tr>
			<td style="border: 1px solid #000000;"><?=$field['NAME'] ?: $field['CODE']?></td>
			<td style="border: 1px solid #000000;"><?=$field['VALUE']?></td>
		</tr>
		<?
	}
	?>
</table>