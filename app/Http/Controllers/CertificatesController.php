<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Http\Requests\CreateCriminalRecordRequest;
use App\Models\Citizen;
use App\Models\Conviction;
use App\Models\Passport;
use Mpdf\Mpdf;

class CertificatesController extends Controller
{
    public function createCriminalRecord(CreateCriminalRecordRequest $request)
    {
        $validated = $request->validated();

        $citizen = Passport::whereSeries($validated['series'])
            ->whereNumber($validated['number'])
            ->first()
            ->citizen()
            ->first();

        $conviction = Conviction::create([
            'citizen_id' => $citizen->id,
            'conviction_date' => $validated['conviction_date'],
            'court_name' => $validated['court_name'],
            'criminal_code' => $validated['criminal_code'],
        ]);

        return back();
    }

    public function criminalRecord(CertificateRequest $request)
    {
        $validated = $request->validated();

        $citizen = Passport::whereSeries($validated['series'])
            ->whereNumber($validated['number'])
            ->first()
            ->citizen()
            ->first();

        $convictions = $citizen->convictions()->get();

        $convictionResultText = '';

        if (!$convictions->isEmpty()) {
            $convictionsCounter = 0;

            $convictionResultText .= "
                <div style='margin-top: 3rem; font-size: 19px;'>
                    Список судимостей:
                </div>
            ";

            foreach ($convictions as $conviction) {
                $convictionsCounter++;

                $convictionResultText .= "
                    <div style='margin-top: 3rem; font-size: 19px;'>
                        <b>
                            $convictionsCounter.
                        </b>

                        <span>
                            $conviction->conviction_date, $conviction->court_name, ст. $conviction->criminal_code УК РФ
                        </span>
                    </div>
                ";
            }
        } else {
            $convictionResultText = "
                <div style='margin-top: 3rem; font-size: 19px; text-align: center;'>
                    <span>
                        Судимости не имеются
                    </span>
                </div>
            ";
        }

        $html = "
            <h1 align='center'>
                Справка
             </h1>

            <h3 align='center'>
                о наличии (отсутствии) судимости  и (или) факта уголовного преследования либо о прекращении уголовного преследования
            </h3>

            <div style='text-transform: uppercase; margin-top: 3rem; font-size: 19px; text-align: center;'>
                <b>
                    $citizen->first_name $citizen->last_name $citizen->patronymic
                </b>
            </div>

            $convictionResultText
        ";

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        $mpdf->OutputHttpDownload('download.pdf');

        return back();
    }
}
